<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Scores') }}
        </h2>
    </x-slot>

    <div class="card">
        <form method="post" action="{{ route('addscore.store') }}">
            @csrf
            @method('POST')

            <input type="hidden" name="reservation_id" value="1">


            <label for="name">Name</label>
            <input type="text" name="name" id="name" required><br>
            <label for="score">Score</label>
            <input type="number" name="score" id="score" required>

            <input type="submit" value="Add score" id="add">
        </form>

    </div>

</x-app-layout>
