<?php

namespace App\Livewire;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public $email;

    public $name;

    public $subject;

    public $message;

    public $showSuccess = false;

    public $showError = false;

    public $successMessage = '';

    public $errorMessage = '';

    protected $rules = [
        'email' => 'required|email',
        'name' => 'required|min:2',
        'subject' => 'required|min:5',
        'message' => 'required|min:10',
    ];

    protected $messages = [
        'email.required' => 'The email address is required.',
        'email.email' => 'Please enter a valid email address.',
        'name.required' => 'Your name is required.',
        'name.min' => 'Your name must be at least 2 characters.',
        'subject.required' => 'A subject is required.',
        'subject.min' => 'Subject must be at least 5 characters.',
        'message.required' => 'Please enter your message.',
        'message.min' => 'Message must be at least 10 characters.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function send()
    {
        $this->validate();

        \Log::info('Contact form validation passed', [
            'email' => $this->email,
            'name' => $this->name,
        ]);

        try {
            $contactMessage = [
                'email' => $this->email,
                'name' => $this->name,
                'subject' => $this->subject,
                'message' => $this->message,
                'is_database_contact' => false,
            ];

            \Log::info('Attempting to send contact email', $contactMessage);

            Mail::to('markjc@mweb.co.za')->send(new ContactMail($contactMessage));

            \Log::info('Email sent successfully');

            // Show success message
            $this->showSuccess = true;
            $this->successMessage = 'Thanks for contacting me, I will get back to you soon.';

            // Hide any existing error
            $this->showError = false;

            // Reset form but preserve the success message
            $this->email = '';
            $this->name = '';
            $this->subject = '';
            $this->message = '';

            // Auto-hide success message after 5 seconds
            $this->js("setTimeout(() => { \$wire.set('showSuccess', false); }, 5000)");

        } catch (\Exception $e) {
            \Log::error('Contact form error: '.$e->getMessage());
            \Log::error('Contact form error trace: '.$e->getTraceAsString());

            // Show error message
            $this->showError = true;
            $this->errorMessage = 'Sorry, there was an error sending your message. Please try again later.';

            // Hide any existing success
            $this->showSuccess = false;

            // Auto-hide error message after 5 seconds
            $this->js("setTimeout(() => { \$wire.set('showError', false); }, 5000)");
        }
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
