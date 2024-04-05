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
                    <!-- Table Section -->
                    <table class="min-w-full divide-y divide-gray-200">
                        <!-- Table Header -->
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date - Time</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Option</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duration</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount of People</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount of Children</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th> <!-- Added Actions column -->
                            </tr>
                        </thead>
                        <!-- Table Body -->
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->option->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->duration }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->amount_of_people }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->amount_of_children }}</td>
                                    <!-- Actions Column -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <!-- Edit Button -->
                                        <a href="{{ route('reservations.edit', $reservation->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <!-- Delete Button -->
                                        <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 ml-4">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- End of Padding and White Background -->
            </div> <!-- End of Container with Yellow Background and Border -->
        </div>
    </div> <!-- End of Main Content Section -->
</x-app-layout>
