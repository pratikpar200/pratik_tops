<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'booking_id',
        'customer_id',
        'amount',
        'payment_method',
        'transaction_id',
        'payment_status',
        'payment_date'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
