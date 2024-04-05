<x-app-layout>
    <x-slot name="title">
        Create New Option
    </x-slot>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">

    <div class="text-center mb-8">
        <h1 class="font-bold text-dark text-9xl font-roboto-mono">New Option</h1>
    </div>

    <div class="bg-secondary flex justify-center items-center h-full mx-auto w-2/5 rounded-lg">
        <div class="w-full max-w-xl px-8 py-6 font-roboto-mono font-semibold"> <!-- Added font styles -->
            <form id="create-option-form" action="{{ route('admin.options.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-xl font-semibold text-dark">Option Name</label>
                    <input type="text" name="name" id="name" class="mt-1 p-2 block w-full rounded-md placeholder-dark bg-main  border-none" placeholder="Option name...">
                    @error('name')
                    <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-xl font-semibold text-dark">Option description</label>
                    <textarea name="description" id="description" rows="3" class="mt-1 p-2 block w-full rounded-md placeholder-dark bg-main  border-none" placeholder="Option description..."></textarea>
                    @error('description')
                    <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-xl font-semibold text-dark">Option price</label> <!-- Corrected label for price -->
                    <input type="number" name="price" id="price" class="mt-1 p-2 block w-full rounded-md placeholder-dark bg-main border-none" placeholder="Option price...">
                    @error('price')
                    <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex justify-between mt-4"> <!-- Adjusted class to flex justify-between -->
                    <div>
                        <a href="{{ route('admin.options.index') }}" class="bg-dark hover:bg-gray-700 text-secondary font-bold py-2 px-4 rounded mr-2 w-36 text-center">Back to Options</a>
                    </div>
                    <div>
                        <a href="{{ route('admin.options.create') }}" onclick="event.preventDefault(); document.getElementById('create-option-form').submit();" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-36">Create Option</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>