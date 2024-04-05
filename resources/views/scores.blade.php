<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Scores') }}
        </h2>
    </x-slot>

    <div class="bg-[#fbede2] py-5">
        <div class="py-1 m-5 bg-[#fbd158]">
            <div class="flex gap-10 m-3 w-l">
                <p class="align-self-center">Naam: John | Score: 63</p>
                <div>
                    <button class="bg-[#fbede2] py-3 w-20 rounded-md">Edit</button>
                    <button class="bg-[#fbede2] py-3 w-20 rounded-md">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <button class="bg-[#53435e] py-3 w-20 rounded-md text-white">
        <a href="/addscore">
            Add new score
        </a>
    </button>
</x-app-layout>
