<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;
    protected $fillable = ['interaction_id', 'reminder_at'];

    public function interaction()
    {
        return $this->belongsTo(Interaction::class);
    }
}
