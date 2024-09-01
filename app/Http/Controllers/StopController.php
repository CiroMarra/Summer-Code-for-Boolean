<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Stop;
use Illuminate\Http\Request;

class StopController extends Controller
{
    public function index(Trip $trip)
    {
        $stops = $trip->stops; // Ottieni tutte le fermate del viaggio
        return view('stops.index', compact('trip', 'stops'));
    }

    public function create(Trip $trip)
    {
        return view('stops.create', compact('trip'));
    }

    public function store(Request $request, Trip $trip)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $trip->stops()->create($request->only('title', 'description', 'date'));

        return redirect()->route('trips.show', $trip)->with('success', 'Stop added successfully.');
    }

    public function edit(Trip $trip, Stop $stop)
    {
        return view('stops.edit', compact('trip', 'stop'));
    }

    public function update(Request $request, Trip $trip, Stop $stop)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $stop->update($request->only('title', 'description', 'date'));

        return redirect()->route('trips.show', $trip)->with('success', 'Stop updated successfully.');
    }

    public function destroy(Trip $trip, Stop $stop)
    {
        $stop->delete();

        return redirect()->route('trips.show', $trip)->with('success', 'Stop deleted successfully.');
    }
}