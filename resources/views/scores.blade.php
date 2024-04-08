<x-app-layout>
    <!-- Header Section -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Scores') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <div id="success-message"
            class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-green-500 text-white px-4 py-2 rounded-lg shadow-md">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('success-message').remove();
            }, 3000);
        </script>
    @endif

    @if (session('error'))
        <div id="error-message"
            class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-red-500 text-white px-4 py-2 rounded-lg shadow-md">
            {{ session('error') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('error-message').remove();
            }, 3000);
        </script>
    @endif

    <div class="py-12">

        <form action="{{ route('scores.filterByDate') }}" method="GET">
            <label for="filter_date" class="block text-sm font-medium text-gray-700">Filter by Date:</label>
            <input type="date" name="filter_date" id="filter_date"
                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            <button type="submit"
                class="mt-2 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Filter</button>
        </form>

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
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Naam</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aantal punten</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Datum</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th> <!-- Added Actions column -->
                            </tr>
                        </thead>
                        <!-- Table Body -->
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($score as $scoreOutput)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $scoreOutput->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $scoreOutput->score }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $scoreOutput->date }}</td>
                                    <!-- Actions Column -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <!-- Edit Button -->
                                        <a href="{{ route('scores.edit', $scoreOutput->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <!-- Delete Button -->
                                        <form action="{{ route('scores.delete', $scoreOutput->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-900 ml-4">Delete</button>
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


    <div class="flex justify-center mt-8 text-2xl">
        <a href="/addscore" class="bg-dark hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg">Add new
            score</a>
    </div>
</x-app-layout>
