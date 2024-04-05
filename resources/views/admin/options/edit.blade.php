<x-app-layout>
    <x-slot name="title">
        Edit Option
    </x-slot>

    <div class="text-center mb-8">
        <h1 class="font-bold text-dark text-9xl font-roboto-mono">Edit Option</h1>
    </div>

    <div class="bg-secondary flex justify-center items-center h-full mx-auto w-2/5 rounded-lg">
        <div class="w-full max-w-xl px-8 py-6 font-roboto-mono font-semibold">
            <form id="create-option-form" action="{{ route('admin.options.update', $option->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-xl font-semibold text-dark">Option Name</label>
                    <input type="text" name="name" id="name" class="mt-1 p-2 block w-full rounded-md text-dark bg-main border-none" placeholder="Option name..." value="{{ $option->name }}">
                    @error('name')
                    <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-xl font-semibold text-dark">Option description</label>
                    <textarea name="description" id="description" rows="3" class="mt-1 p-2 block w-full rounded-md text-dark bg-main border-none" placeholder="Option description...">{{ $option->description }}</textarea>
                    @error('description')
                    <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-xl font-semibold text-dark">Option price</label>
                    <input type="number" name="price" id="price" class="mt-1 p-2 block w-full rounded-md text-dark bg-main border-none" placeholder="Option price..." value="{{ $option->price }}">
                    @error('price')
                    <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex justify-between mt-4">
                    <div>
                        <a href="{{ route('admin.options.index') }}" class="bg-dark hover:bg-gray-700 text-secondary font-bold py-2 px-4 rounded mr-2 w-36 text-center">Back to Options</a>
                    </div>
                    <div>
                        <a href=" {{ route('admin.options.create') }}" onclick="event.preventDefault(); document.getElementById('create-option-form').submit();" type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-36">Update Option</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>