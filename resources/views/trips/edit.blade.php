@extends('layouts.layouts')
@section('title', 'Trips Edit')
@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Modifica il tuo viaggio!</h1>
        <form action="{{ route('trips.update', $trip->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="title" class="form-label">Modifica il titolo del tuo viaggio</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $trip->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Modifica la descrizione del tuo viaggio</label>
                <textarea id="description" name="description" class="form-control" rows="4">{{ old('description', $trip->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Modifica l'immagine del tuo viaggio</label>
                <input type="file" id="image" name="image" class="form-control">
                @if($trip->image)
                    <div class="mt-3">
                        <label class="form-label">Immagine corrente</label>
                        <img src="{{ asset('storage/' . $trip->image) }}" alt="Trip Image" class="img-fluid" style="max-height: 200px;">
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Aggiorna viaggio</button>
                <a href="{{ route('trips.index') }}" class="btn btn-secondary">Annulla modifiche</a>
            </div>
        </form>
    </div>
@endsection