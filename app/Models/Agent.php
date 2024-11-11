<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;

class Agent extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
  
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
