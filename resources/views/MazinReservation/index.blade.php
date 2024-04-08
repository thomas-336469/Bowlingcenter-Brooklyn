<x-app-layout>
    <!-- Header Section -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Reservations') }}
        </h2>
    </x-slot>

    <!-- Main Content Section -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Container with Yellow Background and Border -->
            <div class="bg-yellow-100 border border-gray-300 rounded-lg overflow-hidden shadow-sm">
                <!-- Padding and White Background Inside Container -->
                <div class="p-6 bg-white">
                    <!-- Filter date -->
                    <h1>Reservering van {{ $user->name }}</h1>
                    <form method="GET" action="{{ route('mazinReservation.index') }}">
                        <input type="date" name="filter_date" value="{{ request('filter_date') }}">
                        <button type="submit" class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">Toon Reserveringen</button>
                    </form>

                    <!-- If there is no info when date is filtered, give alert message and send them back -->
                    @if($mazinReservations->isEmpty())
                    <script>
                        alert('Er is geen informatie over deze periode');
                        // send the user back to the previous page with no input in the filter date field
                        window.location.href = "{{ route('mazinReservation.index') }}";
                    </script>
                    @else

                    <!-- Table Section -->
                    <table class="min-w-full divide-y divide-gray-200">
                        <!-- Table Header -->
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Naam</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Datum</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aantal uren</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Begintijd</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Eindtijd</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aantal Volwassen</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aantal Kinderen</th>
                            </tr>
                        </thead>
                        <!-- Table Body -->
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($mazinReservations->filter(function ($reservation) use ($user) {
                            return $reservation->person->Voornaam == $user->name;
                            }) as $mazinReservation)
                            <tr>

                                <td class="px-6 py-4 whitespace-nowrap">{{ $mazinReservation->person->Voornaam }}</td>

                                <td class="px-6 py-4 whitespace-nowrap">{{ $mazinReservation->datum }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $mazinReservation->AantalUren }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $mazinReservation->BeginTijd }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $mazinReservation->EindTijd }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $mazinReservation->AantalVolwassen }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ is_null($mazinReservation->AantalKinderen) ? 'NULL' : $mazinReservation->AantalKinderen }}
                                </td>
                                <!-- Actions Column -->

                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div> <!-- End of Padding and White Background -->
            </div> <!-- End of Container with Yellow Background and Border -->
        </div>
    </div> <!-- End of Main Content Section -->
</x-app-layout>