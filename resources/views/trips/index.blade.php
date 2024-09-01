@extends('layouts.layouts')

@section('title', 'Trips Edit')

@section('content')
<div class="container d-flex justify-content-center my-5">
    <div class="welcome-container position-relative text-center">
        <!-- Overlay div -->
            <h1 class="mb-1 text-purple">Benvenuto {{ Auth::user()->name }} !</h1>
            <p class="mb-1 text-purple">Grazie per aver visitato il nostro sito.</p>
            @auth
                <div>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-1">Vai al tuo Profilo</a>
                    <a href="{{ route('trips.list') }}" class="btn btn-secondary mb-1">Vai alla lista dei tuoi viaggi</a>
                </div>
            @endauth

        </div>
        
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection