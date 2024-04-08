<x-app-layout>
    <!-- Header Section -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Reservation') }}
        </h2>
    </x-slot>

    <!-- Main Content Section -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Container with White Background and Shadow -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Padding and White Background Inside Container -->
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    <!-- Form Section -->
                    <form action="{{ route('baanReservation.update', ['id' => $mazinReservation->BaanId]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <label for="nummer">Baan nummer:</label>
                        <select name="nummer" id="nummer">
                            @for ($i = 1; $i <= 8; $i++) <option value="{{ $i }}" {{ old('nummer', $mazinReservation->baan->Nummer) == $i ? 'selected' : '' }}>
                                {{ $i }} {{ $i >= 7 ? '(Kinderbaan)' : '' }}
                                </option>
                                @endfor
                        </select>
                        <button type="submit">Update</button>
                    </form>
                    <!-- End of Form Section -->

                </div> <!-- End of Form Section -->
            </div> <!-- End of Container with White Background and Shadow -->
        </div>
    </div> <!-- End of Main Content Section -->
</x-app-layout>