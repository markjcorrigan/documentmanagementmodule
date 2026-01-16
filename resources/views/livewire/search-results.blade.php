
<div class="flex flex-col min-h-screen">
    <div class="flex-grow">
        <!-- your search results container -->
        <div class="mt-4 p-4 border rounded-md bg-gray-50000 border-indigo-600">
            @if (count($results) == 0)
                <p>No results found.</p>
            @endif
            <p class="text-white">Click a result below to go to that post:</p>
            @foreach($results as $result)
                <div class="pt-2" wire:key="{{$result->id}}">
                    <h2 class="text-2xl text-white font-bold"><a href="/post/details/{{$result->id}}">Post Title:&nbsp;&nbsp; <u>{{$result->post_title}}</u></a></h2>

                    <p class="text-white  text-wrap" style="word-wrap: break-word;">
                        <a href="/post/details/{{$result->id}}">Post Detail (Shortened):&nbsp;&nbsp; {{ substr($result->clean_description, 0, 200) }}...</a>
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</div>

