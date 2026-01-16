<x-profile :sharedData="$sharedData" doctitle="{{$sharedData['name']}}'s Profile">
    <livewire:post-list :name="$sharedData['name']" />
</x-profile>