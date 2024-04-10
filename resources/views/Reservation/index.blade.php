<x-app-layout>
    <!-- Header Section -->
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            All Reservations
        </h2>
    </x-slot>

    <!-- Main Content Section -->
    <div class="py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Container with Teal Background and Border -->
            <div class="bg-gray-900 border border-gray-800 rounded-lg overflow-hidden shadow-lg">
                <!-- Padding and White Background Inside Container -->
                <div class="p-6 bg-gray-800">
                    <!-- Filter date -->
                    <h1 class="text-2xl font-semibold text-white mb-4">Reservations for {{ $user->name }}</h1>
                    <form method="GET" action="{{ route('Reservation.index') }}">
                        <input type="date" name="filter_date" value="{{ request('filter_date') }}" class="px-4 py-2 border border-gray-700 rounded mr-2 bg-gray-800 text-white">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Show Reservations</button>
                    </form>

                    <!-- If there is no info when date is filtered, give alert message and send them back -->
                    @if($Reservations->isEmpty())
                    <div class="text-red-500 mt-4">
                        <p>There is no information for this period.</p>
                    </div>
                    <script>
                        // send the user back to the previous page with no input in the filter date field
                        window.location.href = "{{ route('Reservation.index') }}";
                    </script>
                    @else

                    <!-- Table Section -->
                    <div class="overflow-x-auto mt-4">
                        <table class="min-w-full">
                            <!-- Table Header -->
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300 uppercase border-b border-gray-600">Name</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300 uppercase border-b border-gray-600">Date</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300 uppercase border-b border-gray-600">Hours</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300 uppercase border-b border-gray-600">Start Time</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300 uppercase border-b border-gray-600">End Time</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300 uppercase border-b border-gray-600">Adults</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300 uppercase border-b border-gray-600">Children</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                                @foreach ($Reservations->filter(function ($reservation) use ($user) {
                                return $reservation->person->Voornaam == $user->name;
                                }) as $Reservation)
                                <tr class="border-b border-gray-600">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-200">{{ $Reservation->person->Voornaam }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-200">{{ $Reservation->datum }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-200">{{ $Reservation->AantalUren }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-200">{{ $Reservation->BeginTijd }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-200">{{ $Reservation->EindTijd }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-200">{{ $Reservation->AantalVolwassen }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-200">{{ is_null($Reservation->AantalKinderen) ? '-' : $Reservation->AantalKinderen }}</td>
                                    <!-- Actions Column -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- End of Overflow Container -->
                    @endif
                </div> <!-- End of Padding and White Background -->
            </div> <!-- End of Container with Teal Background and Border -->
        </div> <!-- End of Max Width Container -->
    </div> <!-- End of Main Content Section -->
</x-app-layout>