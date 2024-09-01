@extends('layouts.layouts')

@section('title', $trip->title)

@section('content')
    <div class="container">
        <!-- Titolo del viaggio -->
        <h1 class="text-purple">{{ $trip->title }}</h1>
        <p class="text-purple fw-bold">{{ $trip->description }}</p>

        <!-- Immagine del viaggio -->
        @if($imagePath)
            <img src="{{ $imagePath }}" alt="Image for {{ $trip->title }}" class="img-fluid trip-image ">
        @else
            <p class="text-purple">Nessuna immagine disponibile per il viaggio.</p>
        @endif

        <!-- Lista delle cose da fare -->
        <h2 class="text-purple">Cose da fare</h2>
        <ul id="todo-list">
            @foreach ($todoItems as $todoItem)
                <li class="text-purple">
                    <!-- Checkbox per l'elemento da fare -->
                    <form action="{{ route('todos.updateStatus', $todoItem) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="completed" value="{{ $todoItem->completed ? 1 : 0 }}">
                        <input type="checkbox" 
                               name="completed" 
                               value="1" 
                               onchange="this.form.submit()" 
                               {{ $todoItem->completed ? 'checked' : '' }}>
                    </form>
                    <span class="{{ $todoItem->completed ? 'completed' : '' }}">{{ $todoItem->title }}</span>

                    <!-- Sistema di valutazione con stelle -->
                    <form action="{{ route('todos.updateRating', $todoItem) }}" method="POST" class="rating-form" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <div class="rating" data-rating="{{ $todoItem->rating }}">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="star {{ $i <= $todoItem->rating ? 'selected' : '' }}" data-value="{{ $i }}">&#9733;</span>
                            @endfor
                        </div>
                        <input type="hidden" name="rating" value="{{ $todoItem->rating }}">
                    </form>
                    <form action="{{ route('todos.destroy', $todoItem) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Elimina</button>
                    </form>
                </li>
            @endforeach
        </ul>
        <form action="{{ route('todos.store', $trip) }}" method="POST" class="mt-4">
            @csrf
            <input type="text" name="title" placeholder="visita al museo" required>
            <button type="submit" class="btn btn-primary">Aggiungi</button>
        </form>
    </div>

    <!-- Include del file JavaScript -->
    <script src="{{ asset('js/rating.js') }}"></script>
@endsection