<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPostsBlogPostController extends Controller
{
    public function UserAddPost()
    {
        // Gate::authorize('is-super-admin');
        return view('frontend.blog.add_post');
    }

    public function UserStorePost(Request $request)
    {
        $validatedData = $request->validate([
            'post_title' => 'required|string|max:255',
            'post_tags' => 'required|string',
            'post_description' => 'required|string',
            'post_photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $file = $request->file('post_photo');

        // Get ONLY the filename, strip any path that might exist
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();

        // Create clean filename
        $imageName = 'blogpostimage_'.$originalName.'.'.$extension;

        $destinationPath = storage_path('app/public/images');

        // FIXED: Intervention Image v3 syntax
        $manager = \Intervention\Image\ImageManager::gd();
        $img = $manager->read($file);

        $img->scale(width: 409, height: 368);

        // Save according to original extension
        switch (strtolower($extension)) {
            case 'png':
                $img->toPng()->save($destinationPath.'/'.$imageName);
                break;
            case 'gif':
                $img->toGif()->save($destinationPath.'/'.$imageName);
                break;
            default: // jpg, jpeg
                $img->toJpeg(quality: 80)->save($destinationPath.'/'.$imageName);
                break;
        }

        // Save to DB - ONLY filename, no path
        $post = new BlogPost;
        $post->user_id = Auth::user()->id;
        $post->post_title = $validatedData['post_title'];
        $post->post_slug = strtolower(str_replace(' ', '-', $validatedData['post_title']));
        $post->photo = basename($imageName); // Only filename
        $post->post_tags = $validatedData['post_tags'];
        $post->post_description = $validatedData['post_description'];
        $post->save();

        $notification = [
            'message' => 'BlogPost Posted Successfully. Waiting on approval!',
            'alert-type' => 'success',
        ];

        \Mail::to('markjc@mweb.co.za')->send(new \App\Mail\BlogPostNotification($post));

        return redirect()->route('blog')->with($notification);
    }

    public function usersearch(Request $request)
    {
        $query = $request->input('search');

        if ($query) {
            $posts = BlogPost::where('approved', 1)
                ->where(function ($q) use ($query) {
                    $q->where('post_title', 'LIKE', '%'.$query.'%')
                        ->orWhere('post_tags', 'LIKE', '%'.$query.'%')
                        ->orWhere('post_description', 'LIKE', '%'.$query.'%')
                        ->orWhere('post_slug', 'LIKE', '%'.$query.'%');
                })
                ->latest()
                ->paginate(6);
        } else {
            $posts = BlogPost::where('approved', 1)->latest()->paginate(6);
        }

        $rposts = BlogPost::where('approved', 1)->latest()->limit(5)->get();

        return view('frontend.blog.searchresults', compact('posts', 'rposts', 'query'));
    }

    public function firstPost()
    {
        $firstPost = BlogPost::all()->first();
        if ($firstPost) {
            return redirect()->to('/post/details/'.$firstPost->post_slug);
        } else {
            return response()->view('errors.no-blogs-found');
        }
    }
}
