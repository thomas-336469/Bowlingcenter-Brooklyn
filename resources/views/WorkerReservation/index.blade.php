<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Reservations') }}
        </h2>
    </x-slot>

    @foreach ($reservations as $reservation)
    <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-4">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Reservation ID: {{ $reservation->id }}</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">User: {{ $reservation->user_name }}</p>
        </div>
    </div>
    @endforeach
    <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-4">
        <div class="px-4 py-5 sm:px-6">
            <a href="{{ route('worker.reservations.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Reservation</a>
        </div>
    </div>
</x-app-layout>