<x-mail::message>
    # New Contact Form Submission

    **From:** {{ $contactMessage['name'] }}
    **Email:** {{ $contactMessage['email'] }}
    **Subject:** {{ $contactMessage['subject'] }}

    **Message:**
    {{ $contactMessage['message'] }}

    [📧 Reply to {{ $contactMessage['name'] }}](mailto:{{ $contactMessage['email'] }})

    Regards

    {{ config('app.name') }}
</x-mail::message>

