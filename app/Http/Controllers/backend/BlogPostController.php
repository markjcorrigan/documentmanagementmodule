<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BlogPostController extends Controller
{
    public function AddPost()
    {
        //        Gate::authorize('is-super-admin');
        return view('backend.blog.add_post');
    } // End method

    public function StorePost(Request $request)
    {
        $validatedData = $request->validate([
            'post_title' => 'required|string|max:255',
            'post_tags' => 'required|string',
            'post_description' => 'required|string',
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        try {
            $file = $request->file('photo');

            // Get original filename without path
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();

            // Create filename: blogpostimage_originalname.jpg
            $imageName = 'blogpostimage_'.$originalName.'.'.$extension;

            // Process image with Intervention
            $manager = new ImageManager(new Driver);
            $img = $manager->read($file);
            $img = $img->resize(409, 368);

            // Save to storage/app/public/images/
            $storagePath = storage_path('app/public/images/'.$imageName);
            $img->toJpeg(80)->save($storagePath);

            $post = new BlogPost;
            $post->user_id = Auth::user()->id;
            $post->post_title = $validatedData['post_title'];
            $post->post_slug = strtolower(str_replace(' ', '-', $validatedData['post_title']));
            $post->photo = $imageName; // Store only filename
            $post->post_tags = $validatedData['post_tags'];
            $post->post_description = $validatedData['post_description'];
            $post->save();

            $notification = [
                'message' => 'Posted Successfully!',
                'alert-type' => 'success',
            ];

            return redirect()->route('all.post')->with($notification);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to create post: '.$e->getMessage()]);
        }
    }

    //    public function showFirstPost()
    //    {
    //        $firstPost = BlogPost::all()->first();
    // //dd($firstPost);
    //        if ($firstPost) {
    //            return redirect()->to('/post/details/' . $firstPost->post_slug);
    //        } else {
    //            return response()->view('errors.no-blogs-found');
    //        }
    //    }

    public function showEditForm(BlogPost $post)
    {
        return view('edit-post', ['post' => $post]);
    }

    public function AllPost()
    {
        //        Gate::authorize('is-super-admin');
        $posts = BlogPost::with('user')->Latest()->get();

        return view('backend.blog.all_posts', compact('posts'));
    }

    public function blogsByAuthor()
    {
        $posts = BlogPost::join('users', 'blog_posts.user_id', '=', 'users.id')
            ->orderBy('users.name', 'asc')
            ->select('blog_posts.*')
            ->get();

        return view('backend.blog.blogsbyauthor', compact('posts'));
    }

    public function EditPost($id)
    {
        //        Gate::authorize('is-super-admin');
        $post = BlogPost::findOrFail($id);

        return view('backend.blog.edit_post', compact('post'));
    } // End method

    public function UpdatePost(Request $request, $id)
    {
        $post = BlogPost::find($id);
        $validatedData = $request->validate([
            'post_title' => 'required|string|max:255',
            'post_tags' => 'required|string',
            'post_description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        try {
            if ($request->hasFile('photo')) {
                // Delete old photo from storage/app/public/images/
                if ($post->photo && Storage::disk('public')->exists('images/'.$post->photo)) {
                    Storage::disk('public')->delete('images/'.$post->photo);
                }

                $file = $request->file('photo');

                // Get original filename without path
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();

                // Create filename: blogpostimage_originalname.jpg
                $imageName = 'blogpostimage_'.$originalName.'.'.$extension;

                // Process image with Intervention
                $manager = new ImageManager(new Driver);
                $img = $manager->read($file);
                $img = $img->resize(409, 368);

                // Save to storage/app/public/images/
                $storagePath = storage_path('app/public/images/'.$imageName);
                $img->toJpeg(80)->save($storagePath);

                $post->photo = $imageName; // Store only filename
            }

            $post->user_id = Auth::user()->id;
            $post->post_title = $validatedData['post_title'];
            $post->post_slug = strtolower(str_replace(' ', '-', $validatedData['post_title']));
            $post->post_tags = $validatedData['post_tags'];
            $post->post_description = $validatedData['post_description'];
            $post->save();

            $notification = [
                'message' => 'BlogPost Updated Successfully!',
                'alert-type' => 'info',
            ];

            return redirect()->route('all.post')->with($notification);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to update post: '.$e->getMessage()]);
        }
    }

    //    public function approve(BlogPost $blogPost)
    //    {
    //        $blogPost->update(['approved' => true]);
    //
    //        return redirect()->route('all-post')->with('success', 'Blog post approved successfully');
    //    }

    public function updatePostStatus(Request $request)
    {
        $post = BlogPost::find($request->post_id);
        $post->approved = $request->approved;
        $post->save();

        // Forget the cache for approved posts
        Cache::forget('approved_posts');

        return response()->json(['status' => 200, 'message' => 'Post status updated successfully']);
    }

    public function showCreateForm()
    {
        if (! auth()->check()) {
            return redirect('/');
        }

        return view('create-post');
    }

    public function viewSinglePost(BlogPost $post)
    {
        // $post['post_description'] = strip_tags(Str::markdown($post->body), '<p><ul><ol><li><strong><h3><h1><i><br>');

        // $allowedTags = '<p><ul><ol><li><strong><h3><h1><i><br>';
        // $post['body'] = strip_tags($post->body, $allowedTags);

        return view('single-post', ['post' => $post]);
    }

    public function delete(BlogPost $post)
    {
        $post->delete();
        session()->flash('success', 'Post successfully deleted.');

        return redirect('/profile/'.auth()->user()->name);
    }

    public function DeletePost($id)
    {
        $post = BlogPost::find($id);

        // Delete photo from storage/app/public/images/
        if ($post->photo && Storage::disk('public')->exists('images/'.$post->photo)) {
            Storage::disk('public')->delete('images/'.$post->photo);
        }

        BlogPost::destroy($id);

        $notification = [
            'message' => 'BlogPost Deleted Successfully!',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);
    }
}
