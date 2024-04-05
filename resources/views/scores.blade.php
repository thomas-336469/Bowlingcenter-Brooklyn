<x-app-layout>
    <x-slot name="title">
        Scores Overview
    </x-slot>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">

    <div class="text-center mb-8">
        <h1 class="text-9xl font-bold font-roboto-mono text-dark">Score View</h1>
    </div>

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

    <div
        class="bg-secondary flex justify-center items-center h-full mx-auto w-4/5 rounded-lg font-roboto-mono font-semibold">
        <div class="w-full p-8">
            <ul class="text-lg">
                @foreach ($score as $scoreOutput)
                    <li class="bg-main py-3 rounded-lg m-4 flex justify-between items-center text-dark text-xl px-12">
                        <div class="w-9/12">
                            Naam: {{ $scoreOutput->name }} | Score: {{ $scoreOutput->score }}
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('scores.edit', $scoreOutput->id) }}"
                                class="bg-secondary hover:bg-green-500 hover:text-white transition-colors text-dark font-bold py-2 px-4 rounded">Edit</a>
                            <form method='POST' action=" {{ route('scores.delete', $scoreOutput->id) }}"
                                onsubmit="return confirm('Are you sure you want to delete this score?')">
                                @csrf
                                @method('DELETE')
                                <button type='submit'
                                    class="bg-secondary hover:bg-red-500 hover:text-white transition-colors text-dark font-bold py-2 px-4 rounded">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="flex justify-center mt-8 text-2xl">
        <a href="/addscore" class="bg-dark hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg">Add new
            score</a>
    </div>
</x-app-layout>
