<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'customer_id',
        'booking_id',
        'rating',
        'review',
        'status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
