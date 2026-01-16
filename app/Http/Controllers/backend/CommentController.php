<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function UserComments()
    {
        $comments = Comment::with('post')->get();

        return view('backend.comment.comments', compact('comments'));
    }

    public function CommentStatusUpdate(Request $request)
    {
        Log::info('Comment status update request received', $request->all());
        $comment_id = $request->input('comment_id');
        $comment_status = $request->input('status', 0);
        Log::info('Comment ID: '.$comment_id);
        Log::info('Comment Status: '.$comment_status);
        $comment = Comment::find($comment_id);
        if ($comment) {
            Log::info('Comment found');
            $comment->status = $comment_status;
            $comment->save();
            Log::info('Comment status updated', ['comment_id' => $comment_id, 'status' => $comment_status]);

            return response()->json(['status' => 200]);
        } else {
            Log::error('Comment not found', ['comment_id' => $comment_id]);

            return response()->json(['status' => 400]);
        }
    }

    public function ContactMessage()
    {
        $contactMessages = Contact::with('service')->latest()->paginate(15); // ← CHANGED from get() to paginate(15)

        return view('backend.contact.all_contact_messages', compact('contactMessages'));
    }

    public function DeleteContact($id)
    {
        Contact::findOrFail($id)->delete();
        $notification = [
            'message' => 'Contact Message Deleted Successfully!',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);
    }
}

//
// namespace App\Http\Controllers\backend;
//
// use App\Models\Comment;
// use App\Models\Contact;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
//
// class CommentController extends Controller
// {
//    public function UserComments(){
//        $comments = Comment::with('post')->get();
//        return view('backend.comment.comments', compact('comments'));
//    } // End method
//
// //    public function UserComments(){
// //        $comments = Comment::all();
// //        return view('backend.comment.comments', compact('comments'));
// //    } // End method
//
//    public function CommentStatusUpdate(Request $request){
//        $comment_id = $request->input('comment_id');
//        $comment_status = $request->input('status', 0);
//        $comment = Comment::find($comment_id);
//        if($comment){
//            $comment->status = $comment_status;
//            $comment->save();
//        }
//        return response()->json(['status' => 200]);
//    } // End method
//
//
//    public function ContactMessage()
//    {
//        $contactMessages = Contact::with('service')->Latest()->get();
//        return view('backend.contact.all_contact_messages', compact('contactMessages'));
//    }
//
//
//    public function DeleteContact($id){
//        Contact::findOrFail($id)->delete();
//        $notification = [
//            'message' => 'Contact Message Deleted Successfully!',
//            'alert-type' => 'info'
//        ];
//
//        return redirect()->back()->with($notification);
//    } // End method
//
// }
