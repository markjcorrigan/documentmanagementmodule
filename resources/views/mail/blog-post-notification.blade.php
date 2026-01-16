<x-mail::message>
    # New Blog Post Added

  {{ date('c') }}

    An email to inform you that a new blog post has been added by {{ $blogPost->author?->name }}.

    Post Title: {{ $blogPost->post_title }}

    Thanks,

    {{ $blogPost->author?->name }}

</x-mail::message>
