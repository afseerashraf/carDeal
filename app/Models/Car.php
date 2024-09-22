<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Car extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'brand_id', 'image'];
    
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id', 'id');
    }

    public function order(){
        return $this->hasOne(Order::class);
    }
    
}
