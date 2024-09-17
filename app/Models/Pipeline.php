<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pipeline extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'position'];

    // Define a relationship to the deals
    public function deals()
    {
        return $this->hasMany(Deal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}


