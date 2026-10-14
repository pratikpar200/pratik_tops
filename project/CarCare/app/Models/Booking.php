<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'customer_id',
        'service_id',
        'mechanic_id',
        'vehicle_name',
        'vehicle_number',
        'booking_date',
        'booking_time',
        'amount',
        'booking_status',
        'payment_status',
        'notes'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function serviceRelation()
    {
        // Named serviceRelation so it doesn't conflict with any service column, but we can also use service()
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function mechanic()
    {
        return $this->belongsTo(Mechanic::class);
    }
}
