<div class="flex flex-col items-center p-8 bg-gray-100 rounded-lg shadow-md">
    <div class="flex flex-wrap justify-center items-center gap-4 p-4 bg-white rounded-lg shadow-sm">
        <input
            type="number"
            wire:model="number1"
            placeholder="Number 1"
            class="p-2 pl-10 pr-8 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >

        <select
            class="w-24 p-2 pr-8 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 appearance-none bg-no-repeat bg-right"
            wire:model="action"
            style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 24 24%22%3E%3Cpath d=%22M7 10l5 5 5-5z%22/%3E%3C/svg%3E'); background-position: right 0.5rem center; background-size: 1.5em 1.5em;"
        >
            <option>+</option>
            <option>-</option>
            <option>*</option>
            <option>/</option>
            <option>%</option>
        </select>

        <input
            type="number"
            wire:model="number2"
            placeholder="Number 2"
            class="p-2 pl-10 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >
        <button
            wire:click="calculate"
            class="py-2 px-4 bg-indigo-500 hover:bg-indigo-600 disabled:cursor-not-allowed disabled:bg-opacity-90 rounded-lg text-white text-lg"
            {{ $disabled ? ' disabled' : ''}}
        >
            =
        </button>
    </div>
    <p class="text-3xl font-bold mt-4">{{$result}}</p>
</div>
