<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Scores') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Score</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('scores.update', $score->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="reservation_id" value="1">

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $score->name }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="score" class="col-md-4 col-form-label text-md-right">Score</label>

                                <div class="col-md-6">
                                    <input id="score" type="number" class="form-control" name="score" value="{{ $score->score }}" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Score
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
