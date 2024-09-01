<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\TodoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::all();
        return view('trips.index', compact('trips'));
    }

    public function list()
    {
        $trips = Trip::all();
        return view('trips.list', compact('trips'));
    }

    public function create()
    {
        return view('trips.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:400',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Trip::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('trips.index')->with('success', 'Trip created successfully.');
    }

    public function show(Trip $trip)
    {
        $todoItems = $trip->todoItems;

        // Controlla se $trip->image è null prima di accedere alla proprietà
        $imagePath = $trip->image ? asset('storage/' . $trip->image) : null;

        return view('trips.show', compact('trip', 'todoItems', 'imagePath'));
    }

    public function edit(Trip $trip)
    {
        return view('trips.edit', compact('trip'));
    }

    public function update(Request $request, Trip $trip)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:400',
        ]);

        $imagePath = $trip->image;

        if ($request->hasFile('image')) {
            // Se c'è un'immagine esistente, eliminala
            if ($trip->image) {
                Storage::disk('public')->delete($trip->image);
            }

            // Carica la nuova immagine
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $trip->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('trips.index')->with('success', 'Trip updated successfully.');
    }

    public function destroy(Trip $trip)
    {
        // Controlla se c'è un'immagine da eliminare
        if ($trip->image) {
            Storage::disk('public')->delete($trip->image);
        }

        $trip->delete();

        return redirect()->route('trips.index')->with('success', 'Trip deleted successfully.');
    }

    public function addTodoItem(Request $request, Trip $trip)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $trip->todoItems()->create($request->only('title', 'description'));

        return redirect()->route('trips.show', $trip)->with('success', 'Todo item added successfully.');
    }
}