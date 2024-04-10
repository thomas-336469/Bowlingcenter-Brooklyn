<x-guest-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Update Reservation
    </h2>
    @foreach($errors->all() as $error)
    <div class="text-red-600 text-md">{{ $error }}</div>
    @endforeach

    <form method="POST" action="{{ route('reservations.update', ['reservation' => $reservation->id]) }}">
        @csrf
        @method('POST')

        <label for="alley_id" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Alley number: </label>
        <select name="alley_id" id="alley_id" class="block mt-1 w-full">
            @foreach($alleys as $alley)
            <option value="{{ $alley->id }}" {{ ($reservation->alley_id == $alley->id) ? 'selected' : '' }}>Alley {{ $alley->alley_number }} {{ ($alley->has_bumpers) ? ' (has bumpers)' : '' }}</option>
            @endforeach
        </select>
        <span class="text-red-600 text-xs">
        </span>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 h-10 rounded mt-2">
            Update
        </button>
    </form>

</x-guest-layout>