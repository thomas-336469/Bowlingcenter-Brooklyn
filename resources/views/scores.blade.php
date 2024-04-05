<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Scores') }}
        </h2>
    </x-slot>

    <div class="bg-[#fbede2] py-5">
        {!! $score !!}
    </div>
    <button class="bg-[#53435e] py-3 w-20 rounded-md text-white">
        <a href="/addscore">
            Add new score
        </a>
    </button>
</x-app-layout>
