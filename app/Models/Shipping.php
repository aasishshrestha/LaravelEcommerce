<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'city', 'address', 'order_id', 'email','phone'
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
