<x-app-layout>
    <x-slot name="title">
        Create New Option
    </x-slot>

    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-dark">Create New Option</h1>
    </div>

    <div class="bg-secondary flex justify-center items-center h-full">
        <div class="w-full max-w-md p-8">
            <form action="{{ route('admin.options.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" class="mt-1 p-2 block w-full border-gray-300 rounded-md" placeholder="Enter name">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="3" class="mt-1 p-2 block w-full border-gray-300 rounded-md" placeholder="Enter description"></textarea>
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">price</label>
                    <input type="number" name="price" id="price" class="mt-1 p-2 block w-full border-gray-300 rounded-md" placeholder="Enter price">
                </div>
                <div class="flex justify-between mt-4"> <!-- Adjusted class to flex justify-between -->
                    <div>
                        <a href="{{ route('admin.options.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2 w-36 text-center">Back to Options</a>
                    </div>
                    <div>
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-36">Create Option</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</x-app-layout>