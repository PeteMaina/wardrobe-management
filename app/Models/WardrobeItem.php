<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WardrobeItem extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'category', 'description', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
