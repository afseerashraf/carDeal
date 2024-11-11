<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

// use App\Observers\CustomerObserver;
// use Illuminate\Database\Eloquent\Attributes\ObservedBy;


class Customer extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'mobile', 'email', 'image'];

    public function order(){
        return $this->hasOne(Order::class);
    }
   protected function nameCpital($value): Attribute{
    return Attribute::make(
        set: fn (string $value) => ucfirst($value),
    );
   }
}
