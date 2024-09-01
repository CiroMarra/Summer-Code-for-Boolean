@extends('layouts.layouts')

@section('title', 'Trips Index')

@section('content')
<div class="container my-5">
    <div class="text-center mb-4">
        <h1 class="text-purple">Lista Viaggi</h1>
        <a href="{{ route('trips.create') }}" class="btn btn-primary mb-4">Crea nuovo viaggio</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="row justify-content-center">
        @foreach ($trips as $trip)
            <div class="col-md-8 mb-4">
                <div class="card bg-dark text-white">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <h5 class="mb-0 text-purple">{{ $trip->title }}</h5>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('trips.show', $trip->id) }}" class="btn btn-outline-light btn-sm me-2">Mostra</a>
                            <a href="{{ route('trips.edit', $trip->id) }}" class="btn btn-outline-light btn-sm me-2">Edita</a>
                            <form action="{{ route('trips.destroy', $trip->id) }}" method="POST" class="mb-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Cancella</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection