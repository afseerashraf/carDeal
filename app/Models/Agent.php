<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Agent extends Authenticatable
{
    use HasFactory, Notifiable;
  
    protected $fillable = ['name', 'email', 'password', ];



    public function order(){
        return $this->hasOne(Order::class);
    }
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
    
}
