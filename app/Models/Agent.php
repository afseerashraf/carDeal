<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
  
    protected $fillable = ['name', 'email', 'password', ];


    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
    
}
