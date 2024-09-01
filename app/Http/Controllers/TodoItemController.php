<?php

namespace App\Http\Controllers;

use App\Models\TodoItem;
use App\Models\Trip;
use Illuminate\Http\Request;

class TodoItemController extends Controller
{
    public function store(Request $request, Trip $trip)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        TodoItem::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'trip_id' => $trip->id,
            'completed' => false, // Default to not completed
        ]);

        return redirect()->route('trips.show', $trip)->with('success', 'Todo item added successfully.');
    }

    public function updateStatus(Request $request, TodoItem $todoItem)
    {
        // Toggle completed status
        $todoItem->completed = !$todoItem->completed;
        $todoItem->save();

        return redirect()->route('trips.show', $todoItem->trip_id)->with('success', 'Todo item status updated.');
    }

    public function updateRating(Request $request, TodoItem $todoItem)
{
    $request->validate([
        'rating' => 'required|integer|between:1,5',
    ]);

    $todoItem->rating = $request->input('rating');
    $todoItem->save();

    return redirect()->route('trips.show', $todoItem->trip_id)->with('success', 'Rating updated successfully.');
}
public function destroy(TodoItem $todoItem)
{
    $todoItem->delete();
    return redirect()->route('trips.show', $todoItem->trip_id)->with('success', 'Todo item deleted successfully.');
}
}