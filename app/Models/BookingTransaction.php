<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingTransaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function booking(){
        return $this->belongsTo(Booking::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }
}
