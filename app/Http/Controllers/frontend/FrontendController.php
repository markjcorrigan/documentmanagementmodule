<?php

namespace App\Http\Controllers\frontend;

use App\Mail\ContactMail;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\BlogPost;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Void_;

class FrontendController extends Controller
{

    public function blog()
    {
        return view('frontend.blog.blogpage');
    }


    public function MostVotedPosts()
    {
        return view('frontend.blog.most_voted');
    }


    public function UserAllPost()
    {
        $posts = BlogPost::where('approved', 1)->latest()->get();
        return view('frontend.blog.all_posts', compact('posts'));
    }


    public function portfolio(): View
    {
        return view('frontend.portfoliopage');
    }

    public function pmwayguest(): View
    {
        return view('pmway');
    }

    public function pmwayauth(): View
    {
        return view('pmway');
    }


    public function BlogDetails($id)
    {
        $post = BlogPost::where('id', $id)->first();
        if (!$post) {
            abort(404);
        }
        $rposts = BlogPost::Latest()->get();
        $comments = Comment::where('post_id', $post->id)->where('status', 1)->get();
        return view('frontend.blog.post_details', compact('post', 'rposts', 'comments'));
    }


    public function StoreContactMessage(Request $request)
    {
        $message = new Contact();
        $message->first_name = $request->fname;
        $message->last_name = $request->lname;
        $message->email = $request->email;
        $message->phone = $request->phone;

        // Handle multiple services
        $selectedServices = $request->services ?? [];

        // Store first service for backward compatibility
        $message->service_id = !empty($selectedServices) ? $selectedServices[0] : null;

        // Store ALL selected services as JSON
        $message->selected_services = json_encode($selectedServices);

        $message->description = $request->description;
        $message->save();

        // Build services list for email
        $servicesList = [];
        if (!empty($selectedServices)) {
            foreach ($selectedServices as $serviceId) {
                $service = \App\Models\Service::find($serviceId);
                if ($service) {
                    $servicesList[] = $service->service_title;
                }
            }
        }

        $notification = [
            'message' => 'Your Message has been received! I will get back to you soon.',
            'alert-type' => 'success'
        ];

        $emailData = [
            'subject' => 'Database Contact Message: New Contact',
            'name' => $message->first_name . ' ' . $message->last_name,
            'email' => $message->email,
            'phone' => $message->phone,
            'services' => !empty($servicesList) ? implode(', ', $servicesList) : 'None selected',
            'message' => $message->description,
            'is_database_contact' => true,
        ];

        Mail::to('markjc@mweb.co.za')->send(new ContactMail($emailData));

        return redirect()->back()->with($notification);
    }
}