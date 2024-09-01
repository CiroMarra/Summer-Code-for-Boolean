<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image'];

    public function todoItems()
    {
        return $this->hasMany(TodoItem::class);
    }
}