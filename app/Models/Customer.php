<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use App\Observers\CustomerObserver;
// use Illuminate\Database\Eloquent\Attributes\ObservedBy;


class Customer extends Model
{
    use SoftDeletes;


    public function order(){
        return $this->hasOne(Order::class);
    }
}
