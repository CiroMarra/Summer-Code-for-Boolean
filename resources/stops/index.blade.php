@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Trips</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($trips->isEmpty())
        <p>No trips found. Add a new trip!</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trips as $trip)
                    <tr>
                        <td>{{ $trip->title ?? 'No title available' }}</td> <!-- Usa un controllo per evitare valori null -->
                        <td>{{ $trip->description ?? 'No description available' }}</td> <!-- Usa un controllo per evitare valori null -->
                        <td>
                            <a href="{{ route('trips.show', $trip->id) }}" class="btn btn-primary">Show</a>
                            <a href="{{ route('trips.edit', $trip->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('trips.destroy', $trip->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this trip?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection