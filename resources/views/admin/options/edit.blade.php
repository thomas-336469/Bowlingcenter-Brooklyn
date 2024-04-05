<x-app-layout>
    <x-slot name="title">
        Edit Option
    </x-slot>

    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-dark">Edit Option</h1>
    </div>

    <div class="bg-secondary flex justify-center items-center h-full">
        <div class="w-full max-w-md p-8">
            <form action="{{ route('admin.options.update', $option->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" class="mt-1 p-2 block w-full border-gray-300 rounded-md" placeholder="Enter name" value="{{ $option->name }}">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="3" class="mt-1 p-2 block w-full border-gray-300 rounded-md" placeholder="Enter description">{{ $option->description }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="prijs" class="block text-sm font-medium text-gray-700">Prijs</label>
                    <input type="number" name="prijs" id="prijs" class="mt-1 p-2 block w-full border-gray-300 rounded-md" placeholder="Enter prijs" value="{{ $option->prijs }}">
                </div>
                <div class="flex justify-end mt-4"> <!-- Adjusted class for margin top -->
                    <a href="{{ route('admin.options.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">Back to Options</a> <!-- Added back button -->
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Update Option</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>