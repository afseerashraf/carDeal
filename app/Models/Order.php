<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Observers\CarOrder;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;


class Order extends Model
{
    use HasFactory;

    public function car(){
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }
    public function agent(){
        return $this->belongsTo(Agent::class, 'agent_id', 'id');
    }
    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
