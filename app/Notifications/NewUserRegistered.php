<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUserRegistered extends Notification
{
    use Queueable;

    public function __construct(public User $user) {}

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New User Registration')
            ->line('A new user has registered on your website!')
            ->line('**Name:** '.$this->user->name)
            ->line('**Email:** '.$this->user->email)
            ->line('**Registered at:** '.$this->user->created_at->format('Y-m-d H:i:s'))
            ->action('View Users', url('/admin/users')); // adjust URL as needed
    }
}
