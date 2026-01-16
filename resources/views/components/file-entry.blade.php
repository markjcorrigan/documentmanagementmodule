<<div class="file-entry">
    <h2>{{ $file }}</h2>

    {{-- Inline preview --}}
    @if(auth()->check())
        @php
            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        @endphp

        @if(in_array($ext, ['mp4', 'webm', 'ogg']))
            {{-- Use <video> for playback --}}
            <video width="640" controls>
                <source src="{{ asset('storage/assets/' . $file) }}" type="video/{{ $ext }}">
                Your browser does not support the video tag.
            </video>
        @elseif(in_array($ext, ['jpg', 'jpeg', 'png', 'gif']))
            {{-- Show images inline --}}
            <img src="{{ asset('storage/assets/' . $file) }}" alt="{{ $file }}" width="400">
        @elseif($ext === 'pdf')
            {{-- Inline PDF preview --}}
            <iframe src="{{ asset('storage/assets/' . $file) }}" width="640" height="480"></iframe>
        @endif
    @else
        <p><a href="{{ route('login') }}">Please log in to view this file.</a></p>
    @endif

    {{-- Download link --}}
    @if(auth()->check())
        <p>
            <a href="{{ asset('storage/assets/' . $file) }}" download>Download {{ $file }}</a>
        </p>
    @else
        <p><a href="{{ route('login') }}">Log in to download this file</a></p>
    @endif

    {{-- Upload / Replace --}}
    <form method="POST" action="{{ url('upload-file') }}" enctype="multipart/form-data">
        @csrf
        <label>Upload new file for {{ $file }}:</label>
        <input type="file" name="file">
        <input type="hidden" name="filename" value="{{ $file }}">
        <button type="submit">Upload & Replace</button>
    </form>

    <hr>
</div>
