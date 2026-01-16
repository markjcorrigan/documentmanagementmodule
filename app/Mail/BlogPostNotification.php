<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BlogPostNotification extends Mailable
{
    use Queueable;
    use SerializesModels;

    public $blogPost;

    public function __construct($blogPost)
    {
        $this->blogPost = $blogPost;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Blog Post Added',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.blog-post-notification',
            with: [
                'blogPost' => $this->blogPost,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
