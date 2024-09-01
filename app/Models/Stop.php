<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stop extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image', 'latitude', 'longitude', 'day_id'];
    
    public function day()
    {
        return $this->belongsTo(Day::class);
    }
}