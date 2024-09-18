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
    protected $fillable = ['name', 'mobile', 'email', 'image'];

    public function order(){
        return $this->hasOne(Order::class);
    }
}
