<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Reservations') }}
        </h2>
        @if (session('succes'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
        @endif
    </x-slot>
    <div class="flex flex-col justify-center">
        @foreach ($reservations as $reservation)
        <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-4 w-4/5 mx-auto flex">
            <div class="px-4 py-5 sm:px-6 w-3/5">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Reservation ID: {{ $reservation->id }}</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">User: {{ $reservation->user_name }}</p>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Date: {{ $reservation->date }}</p>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Duration: {{ $reservation->duration }}</p>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Total Cost: {{ $reservation->total_cost }}</p>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Amount of People: {{ $reservation->amount_of_people }}</p>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Amount of Children: {{ $reservation->amount_of_children }}</p>
            </div>
            <div class="px-4 py-5 sm:px-6 w-2/5">
                <a href="{{ route('worker.reservations.update', $reservation) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</a>
                <form action="{{ route('worker.reservations.delete', $reservation->id) }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-4">
        <div class="px-4 py-5 sm:px-6">
            <a href="{{ route('worker.reservations.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Reservation</a>
        </div>
    </div>
</x-app-layout>