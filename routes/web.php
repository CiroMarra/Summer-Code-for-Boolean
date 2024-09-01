<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use App\Http\Controllers\TodoItemController;
use App\Http\Controllers\StopController;




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/', [TripController::class, 'index'])->name('trips.index');
    Route::get('trips/list', [TripController::class, 'list'])->name('trips.list');
    Route::get('trips/create', [TripController::class, 'create'])->name('trips.create');
    Route::post('trips', [TripController::class, 'store'])->name('trips.store');
    Route::get('trips/{trip}', [TripController::class, 'show'])->name('trips.show');
    Route::get('trips/{trip}/edit', [TripController::class, 'edit'])->name('trips.edit');
    Route::put('trips/{trip}', [TripController::class, 'update'])->name('trips.update');
    Route::delete('trips/{trip}', [TripController::class, 'destroy'])->name('trips.destroy');
    Route::get('trips/{trip}/stops', [StopController::class, 'index'])->name('trips.stops.index');
    Route::get('trips/{trip}/stops/create', [StopController::class, 'create'])->name('trips.stops.create');
    Route::post('trips/{trip}/stops', [StopController::class, 'store'])->name('trips.stops.store');
    Route::get('trips/{trip}/stops/{stop}/edit', [StopController::class, 'edit'])->name('trips.stops.edit');
    Route::put('trips/{trip}/stops/{stop}', [StopController::class, 'update'])->name('trips.stops.update');
    Route::delete('trips/{trip}/stops/{stop}', [StopController::class, 'destroy'])->name('trips.stops.destroy');
    Route::post('trips/{trip}/todos', [TodoItemController::class, 'store'])->name('todos.store');
    Route::post('todo-items/{todoItem}/status', [TodoItemController::class, 'updateStatus'])->name('todos.updateStatus');
    Route::patch('todo-items/{todoItem}/rating', [TodoItemController::class, 'updateRating'])->name('todos.updateRating');
    Route::delete('todo-items/{todoItem}', [TodoItemController::class, 'destroy'])->name('todos.destroy');
    Route::get('trips/{trip}', [TripController::class, 'show'])->name('trips.show');
    });

require __DIR__.'/auth.php';