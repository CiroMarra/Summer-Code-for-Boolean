<?php

namespace App\Http\Controllers;

use App\Models\Day;
use Illuminate\Http\Request;

class DayController extends Controller
{
    public function index()
    {
        return Day::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        return Day::create($request->all());
    }

    public function show(Day $day)
    {
        return $day;
    }

    public function update(Request $request, Day $day)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $day->update($request->all());

        return $day;
    }

    public function destroy(Day $day)
    {
        $day->delete();

        return response()->noContent();
    }
}
