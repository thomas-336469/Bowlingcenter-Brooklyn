<x-app-layout>
    <x-slot name="title">
        Admin Options Overview
    </x-slot>

    <div class="text-center mb-8">
        <h1 class="text-9xl font-bold text-dark">All Options</h1>
    </div>

    @if(session('success'))
    <div id="success-message" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-green-500 text-white px-4 py-2 rounded-lg shadow-md">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('success-message').remove();
        }, 3000);
    </script>
    @endif

    @if(session('error'))
    <div id="error-message" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-red-500 text-white px-4 py-2 rounded-lg shadow-md">
        {{ session('error') }}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('error-message').remove();
        }, 3000);
    </script>
    @endif

    <div class="bg-secondary flex justify-center items-center h-full max-w-screen-2/5">
        <div class="w-full max-w-lg p-8">
            <ul class="text-lg">
                @foreach ($options as $option)
                <li class="bg-main p-3 rounded-lg m-4 flex justify-between items-center text-dark text-xl">
                    <div>
                        {{ $option->name }} | {{ $option->description }} | {{ $option->price }}
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.options.edit', $option->id) }}" class="bg-secondary hover:bg-green-500 transition-colors text-white font-bold py-2 px-4 rounded">Edit</a>
                        <form action="{{ route('admin.options.destroy', $option->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this option?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-secondary hover:bg-red-500 transition-colors text-white font-bold py-2 px-4 rounded">Delete</button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="flex justify-center mt-8">
        <a href="{{ route('admin.options.create') }}" class="bg-dark hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg">Add an Option</a>
    </div>
</x-app-layout>