<x-table-layout>
    <div>
        <div class="flex justify-start items-center">
            <div class="w-2/4">
                <h3 class="font-bold">All Reservations from: {{ $user->call_name }}</h3>
            </div>
            <form action="{{ route('reservations.filter') }}" method="GET" class="w-2/4 flex items-center space-x-2">
                <label for="date" class="block text-sm font-medium text-gray-700">Reservations from: </label>
                <input type="date" class="border-none" max="{{ date('Y-m-d') }}" name="date" required>
                <label for="date" class="block text-sm font-medium text-gray-700">to current date</label>

                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 h-10 rounded">
                    Filter
                </button>
                <a href="{{ route('reservations') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 h-10 rounded">
                    Clear
                </a>
            </form>
        </div>

        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Date</th>
                    <th class="px-4 py-2">Duration</th>
                    <th class="px-4 py-2">Start Time</th>
                    <th class="px-4 py-2">End Time</th>
                    <th class="px-4 py-2">Adults</th>
                    <th class="px-4 py-2">Children</th>
                </tr>
            </thead>
            <tbody>
                @if (!$reservations->isEmpty())
                @foreach($reservations as $reservation)
                <tr>
                    <td class="border px-4 py-2 text-gray-700">{{ $reservation->person->call_name }}</td>
                    <td class="border px-4 py-2 text-gray-700">{{ $reservation->reservation_date }}</td>
                    <td class="border px-4 py-2 text-gray-700">{{ $reservation->reservation_duration }}</td>
                    <td class="border px-4 py-2 text-gray-700">{{ $reservation->reservation_start_time }}</td>
                    <td class="border px-4 py-2 text-gray-700">{{ $reservation->reservation_end_time }}</td>
                    <td class="border px-4 py-2 text-gray-700">{{ $reservation->number_of_adults }}</td>
                    <td class="border px-4 py-2 text-gray-700">{{ $reservation->number_of_children }}</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td class="border px-4 py-2 text-gray-700" colspan="7">No reservations found</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-table-layout>