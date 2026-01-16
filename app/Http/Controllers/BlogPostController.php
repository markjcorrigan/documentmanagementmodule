<?php

namespace App\Http\Controllers;

use App\Jobs\SendNewPostEmail;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogPostController extends Controller
{
    public function search($term)
    {
        // Using Laravel Scout for better search
        $posts = BlogPost::search($term)->get();
        $posts->load('user:id,name,avatar');

        return $posts;
    }

    public function actuallyUpdate(BlogPost $post, Request $request)
    {
        $incomingFields = $request->validate([
            'post_title' => 'required',
            'post_description' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $incomingFields['post_title'] = strip_tags($incomingFields['post_title']);
        $incomingFields['post_description'] = strip_tags($incomingFields['post_description']);

        // Handle image upload - FIXED VERSION
        if ($request->hasFile('photo')) {
            // Delete old image if exists
            if ($post->photo && Storage::disk('public')->exists('images/'.$post->photo)) {
                Storage::disk('public')->delete('images/'.$post->photo);
            }

            $image = $request->file('photo');

            // Get ONLY the filename, strip any path
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();

            // Create new filename: blogpostimage_originalname.jpg
            $filename = 'blogpostimage_'.$originalName.'.'.$extension;

            // Store directly in storage/app/public/images/
            $image->storeAs('images', $filename, 'public');

            // Store ONLY the filename in database (not the path)
            $incomingFields['photo'] = $filename;
        }

        $post->update($incomingFields);

        return back()->with('success', 'Post successfully updated');
    }

    public function showEditForm(BlogPost $post)
    {
        return view('edit-post', ['post' => $post]);
    }

    public function delete(BlogPost $post)
    {
        // Delete associated image if exists
        if ($post->photo && Storage::disk('public')->exists('images/'.$post->photo)) {
            Storage::disk('public')->delete('images/'.$post->photo);
        }

        $post->delete();

        return redirect('/profile/'.auth()->user()->name)->with('success', 'Post successfully deleted');
    }

    public function deleteApi(BlogPost $post)
    {
        // Delete associated image if exists
        if ($post->photo && Storage::disk('public')->exists('images/'.$post->photo)) {
            Storage::disk('public')->delete('images/'.$post->photo);
        }

        $post->delete();

        return 'true';
    }

    public function showCreateForm()
    {
        if (! auth()->check()) {
            return redirect('/');
        }

        return view('create-post');
    }

    public function storeNewPost(Request $request)
    {
        $incomingFields = $request->validate([
            'post_title' => 'required',
            'post_description' => 'required',
            'post_tags' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $incomingFields['post_title'] = strip_tags($incomingFields['post_title']);
        $incomingFields['post_description'] = strip_tags($incomingFields['post_description']);
        $incomingFields['post_tags'] = strip_tags($incomingFields['post_tags']);
        $incomingFields['user_id'] = auth()->id();

        // Generate post slug
        $incomingFields['post_slug'] = strtolower(str_replace(' ', '_', $incomingFields['post_title']));

        // Handle image upload - FIXED VERSION
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');

            // Get ONLY the filename, strip any path
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();

            // Create new filename: blogpostimage_originalname.jpg
            $filename = 'blogpostimage_'.$originalName.'.'.$extension;

            // Store directly in storage/app/public/images/
            $image->storeAs('images', $filename, 'public');

            // Store ONLY the filename in database (not the path)
            $incomingFields['photo'] = $filename;
        }

        $newPost = BlogPost::create($incomingFields);

        dispatch(new SendNewPostEmail(['sendTo' => auth()->user()->email, 'name' => auth()->user()->name, 'post_title' => $newPost->post_title]));

        return redirect("/post/{$newPost->id}")->with('success', 'New Post successfully created');
    }

    public function storeNewPostApi(Request $request)
    {
        $incomingFields = $request->validate([
            'post_title' => 'required',
            'post_description' => 'required',
            'post_tags' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $post = new BlogPost;
        $post->post_title = strip_tags($incomingFields['post_title']);
        $post->post_description = strip_tags($incomingFields['post_description']);
        $post->post_tags = strip_tags($incomingFields['post_tags']);
        $post->post_slug = strtolower(str_replace(' ', '_', $incomingFields['post_title']));
        $post->user_id = auth()->id();

        // Handle image upload - FIXED VERSION
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');

            // Get ONLY the filename, strip any path
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();

            // Create new filename: blogpostimage_originalname.jpg
            $filename = 'blogpostimage_'.$originalName.'.'.$extension;

            // Store directly in storage/app/public/images/
            $image->storeAs('images', $filename, 'public');

            // Store ONLY the filename in database (not the path)
            $post->photo = $filename;
        } else {
            $post->photo = '';
        }

        $post->save();

        dispatch(new SendNewPostEmail(['sendTo' => auth()->user()->email, 'name' => auth()->user()->name, 'title' => $post->post_title]));

        return response()->json(['id' => $post->id, 'message' => 'Post successfully created'], 201);
    }

    public function viewSinglePost(BlogPost $post)
    {
        // No need to modify post_description since we want to render it as-is with HTML
        return view('backend.blog.single_post', ['post' => $post]);
    }
}
