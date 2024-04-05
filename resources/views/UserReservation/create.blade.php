<x-app-layout class="">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Reservation') }}
        </h2>   

        @forelse($errors->all() as $whoops)
            {{ $whoops }}
        @empty
            NO ERRORS
        @endforelse
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">
                    <form method="POST" action="{{ route('reservations.store') }}">
                        @csrf
                        @method('POST')
                        <!-- Date and Time -->
                        <div class="mt-4">
                            <label for="date" class="block font-medium text-sm text-gray-700">Date - Time:</label>
                            <input id="date" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="datetime-local" name="date" required />
                        </div>

                        <!-- Options -->
                        <div class="mt-4">
                            <label for="option_id" class="block font-medium text-sm text-gray-700">Options</label>
                            <select name="option_id" id="option_id" class="form-control">
                                @foreach($options as $option)
                                <option value="{{ $option->id }}">{{ $option->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Duration -->
                        <div class="mt-4">
                            <label for="duration" class="block font-medium text-sm text-gray-700">Duration</label>
                            <input id="duration" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="number" name="duration" required />
                        </div>

                        <!-- Number of People -->
                        <div class="mt-4">
                            <label for="amount_of_people" class="block font-medium text-sm text-gray-700">Number of People</label>
                            <input id="amount_of_people" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="number" name="amount_of_people" required />
                        </div>

                        <!-- Number of Children -->
                        <div class="mt-4">
                            <label for="amount_of_children" class="block font-medium text-sm text-gray-700">Number of Children</label>
                            <input id="amount_of_children" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="number" name="amount_of_children" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200">{{ __('Submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
