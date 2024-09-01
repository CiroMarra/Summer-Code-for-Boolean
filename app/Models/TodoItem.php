<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'trip_id',
        'completed',
        'rating',
    ];
    
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}