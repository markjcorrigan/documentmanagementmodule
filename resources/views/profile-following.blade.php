{{-- <x-profile :sharedData="$sharedData" doctitle="Who {{$sharedData['name']}} follows">
  @include('profile-following-only')
</x-profile> --}}


<x-profile :sharedData="$sharedData" doctitle="Who {{$sharedData['name']}} Follows">
  <div class="list-group">
    @foreach($following as $follow)
    <a wire:navigate href="/profile/{{$follow->userBeingFollowed->name}}"
      class="list-group-item list-group-item-action">
      <img class="avatar-tiny" src="{{$follow->userBeingFollowed->avatar}}" />
      {{$follow->userBeingFollowed->name}}
    </a>
    @endforeach
  </div>
</x-profile>