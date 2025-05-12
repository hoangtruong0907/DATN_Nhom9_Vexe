<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';
    protected $primaryKey = 'id';

    protected $fillable = [
        'order_code',
        'trip_code',
        'seats',
        'price',
        'status',
        'code',
        'booking_code',
        'tickets',
        'ticket_code',
        'vxr_transaction_id',
        'pickup_id',
        'drop_off_info',  
        'drop_off_point_id',   
        'customer_name',
        'customer_phone',
        'customer_email',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
