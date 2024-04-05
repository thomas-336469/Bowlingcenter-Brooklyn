<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Reservation') }}
        </h2>
    </x-slot>

    <form method="post" action="{{ route('worker.reservations.update', $reservation->id) }}">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="user_name">User Name:</label>
            <input type="text" class="form-control" name="user_name" value="{{ $reservation->user_name }}" />
            @error('user_name')
            <div class="alert alert-danger text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="user_phone">User Phone:</label>
            <input type="text" class="form-control" name="user_phone" value="{{ $reservation->user_phone }}" />
            @error('user_phone')
            <div class="alert alert-danger text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="date">Date - time:</label>
            <input type="datetime-local" class="form-control" name="date" min="{{ date('Y-m-d\TH:i') }}" value="{{ $reservation->date }}" />
            @error('date')
            <div class="alert alert-danger text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="duration">Duration:</label>
            <input type="number" class="form-control" name="duration" value="{{ $reservation->duration }}" />
            @error('duration')
            <div class="alert alert-danger text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="amount_of_people">Amount of People:</label>
            <input type="number" class="form-control" name="amount_of_people" value="{{ $reservation->amount_of_people }}" />
            @error('amount_of_people')
            <div class="alert alert-danger text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="amount_of_children">Amount of Children:</label>
            <input type="number" class="form-control" name="amount_of_children" value="{{ $reservation->amount_of_children }}" />
            @error('amount_of_children')
            <div class="alert alert-danger text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="option_id">Option:</label>
            <select name="option_id" id="option_id" class="form-control">
                @foreach($options as $option)
                <option value="{{ $option->id }}" {{ ($reservation->option_id == $option->id) ? 'selected' : '' }}>{{ $option->name }}</option>
                @endforeach
            </select>
            @error('option_id')
            <div class="alert alert-danger text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>


    </form>
</x-app-layout>