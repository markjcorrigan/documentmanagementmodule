<section class="w-full">
    <x-page-heading>
        <x-slot:title>

        </x-slot:title>
        <x-slot:subtitle>

        </x-slot:subtitle>
        <x-slot:buttons>

        </x-slot:buttons>
    </x-page-heading>

    <div>
        <p>{{ $this->message }}</p>
        <button wire:click="updateMessage">Update Message</button>
    </div>


</section>