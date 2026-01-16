<div class="flex flex-col gap-6 w-[400px] mx-auto py-16 p-4 bg-gray-100 rounded-lg shadow-md">
    <select
        wire:model="selectedContinent"
        wire:change="changeContinent"
        class="w-full p-2 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
    >
        <option value="-1">Please select continent</option>
        @foreach($continents as $continent)
            <option value="{{$continent->id}}">{{$continent->name}}</option>
        @endforeach
    </select>
    <div class="flex relative">
        <p
            wire:loading
            class="absolute left-0 top-0 right-0 bottom-0 z-10 bg-white bg-opacity-90 py-2 px-3 flex justify-center items-center"
        >
            <svg class="animate-spin h-5 w-5 mr-3" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Loading...
        </p>
        <select
            wire:model="selectedCountry"
            class="flex-1 w-full p-2 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >
            <option value="-1">Please select country</option>
            @foreach($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
            @endforeach
        </select>
    </div>
</div>

