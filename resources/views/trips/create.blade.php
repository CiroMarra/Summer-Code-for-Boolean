@extends('layouts.layouts')
@section('title', 'Trips Edit')
@section('content')
    <div class="container mt-4">
        <h1 class="mb-4 text-purple">Crea il tuo nuovo viaggio! </h1>
        <div class="form-section">
            <form action="{{ route('trips.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label text-purple">Titolo del viaggio</label>
                    <input type="text" name="title" id="title" class="form-control" required placeholder="inserisci il nome del tuo viaggio!">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label text-purple">Descrizione del viaggio</label>
                    <textarea name="description" id="description" class="form-control" rows="4" placeholder="Inserisci una descrizione dettagliata del tuo viaggio!"></textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label text-purple">Carica Immagine del viaggio</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Crea Viaggio</button>
            </form>
        </div>
    </div>
@endsection