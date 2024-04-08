<x-app-layout>
    <!-- Header Section -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Score') }}
        </h2>
    </x-slot>
    @if ($errors->any())
        <div id="error-message"
            class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-red-500 text-white px-4 py-2 rounded-lg shadow-md">
            {{  $errors->first() }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('error-message').remove();
            }, 5000);
        </script>
    @endif

    <!-- Main Content Section -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Container with White Background and Shadow -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Padding and White Background Inside Container -->
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Form Section -->
                    <form method="POST" action="{{ route('scores.update', $score->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <!-- Name Field -->
                        <div class="mt-4">
                            <label for="name" class="block font-medium text-sm text-gray-700">Naam:</label>
                            <input id="name" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="name" value="{{ old('name', $score->name) }}" required />
                        </div>

                        <!-- Score Field -->
                        <div class="mt-4">
                            <label for="score" class="block font-medium text-sm text-gray-700">Score</label>
                            <input id="score" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="number" name="score" max="300" value="{{ old('score', $score->score) }}" required />
                        </div>

                        <!-- Date Field -->
                        <div class="mt-4">
                            <label for="date" class="block font-medium text-sm text-gray-700">Date</label>
                            <input id="date" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="date" name="date" value="{{ old('date', $score->date) }}" required />
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200">{{ __('Submit') }}</button>
                        </div>
                    </form>
                </div> <!-- End of Form Section -->
            </div> <!-- End of Container with White Background and Shadow -->
        </div>
    </div> <!-- End of Main Content Section -->

</x-app-layout>
