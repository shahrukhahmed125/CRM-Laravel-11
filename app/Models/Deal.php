<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;

    protected $fillable = ['deal_name', 'customer_id', 'pipeline_id', 'deal_value', 'closing_date', 'stage', 'user_id','notes'];

    public function pipeline()
    {
        return $this->belongsTo(Pipeline::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
