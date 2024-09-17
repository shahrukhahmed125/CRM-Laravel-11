<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address', 
        'dob',
        'company',
        'status',
    ];

    public function scopeSearch(Builder $query, string $search): Builder
    {
        return $query->where('first_name', 'like', "%{$search}%")
                     ->orWhere('last_name', 'like', "%{$search}%")
                     ->orWhere('email', 'like', "%{$search}%")
                     ->orWhere('phone', 'like', "%{$search}%")
                     ->orWhere('company', 'like', "%{$search}%");
    }

    public function interactions()
    {
        return $this->hasMany(Interaction::class);
    }

    public function deal()
    {
        return $this->hasMany(Deal::class);
    }
}
