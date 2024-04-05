<x-app-layout>
    <x-slot name="title">
        Edit Score
    </x-slot>


    <div class="text-center mb-8">
        <h1 class="font-bold text-dark text-9xl font-roboto-mono">Add Score</h1>
    </div>

    <div class="bg-secondary flex justify-center items-center h-full mx-auto w-2/5 rounded-lg">
        <div class="w-full max-w-xl px-8 py-6 font-roboto-mono font-semibold">
            <form id="create-option-form" method="post" action="{{ route('addscore.store') }}">
                @csrf
                @method('POST')

                <div class="mb-4">
                    <input type="hidden" name="reservation_id" value="1">

                    <label for="name" class="block text-xl font-semibold text-dark">Name</label>
                    <input id="name" type="text" name="name"
                        class="mt-1 p-2 block w-full rounded-md placeholder-dark bg-main border-none"
                        placeholder="Player name..." required autofocus>
                    @error('name')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="score" class="block text-xl font-semibold text-dark">Score</label>


                    <input id="score" type="number" name="score"
                        class="mt-1 p-2 block w-full rounded-md placeholder-dark bg-main border-none"
                        placeholder="Score..." required>
                    @error('score')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex justify-between mt-4">
                    <div>
                        <a href="{{ route('scores') }}"
                            class="bg-dark hover:bg-gray-700 text-secondary font-bold py-2 px-4 rounded mr-2 w-36 text-center">Back
                            to Scores</a>
                    </div>
                    <div>
                        <a href=" {{ route('scores') }}"
                            onclick="event.preventDefault(); document.getElementById('create-option-form').submit();"
                            type="submit"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-36">Add
                            Score</a>
                    </div>
            </form>

        </div>

</x-app-layout>
