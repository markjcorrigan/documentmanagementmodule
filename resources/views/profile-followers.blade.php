{{--<x-profile :sharedData="$sharedData" doctitle="{{$sharedData['name']}}'s followers">--}}
    {{-- @include('profile-followers-only')--}}
    {{--</x-profile>--}}


<x-profile :sharedData="$sharedData" doctitle="{{$sharedData['name']}}'s Followers">
    <div class="list-group">
        @foreach($followers as $follow)
        <a wire:navigate href="/profile/{{$follow->userDoingTheFollowing->name}}"
            class="list-group-item list-group-item-action">
            <img class="avatar-tiny" src="{{$follow->userDoingTheFollowing->avatar}}" />
            {{$follow->userDoingTheFollowing->name}}
        </a>
        @endforeach
    </div>
</x-profile>