<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Customer extends Authenticatable
{
    use Notifiable;
    
    protected $fillable = [
        'username',
        'password',
        'name',
        'address',
        'email',
        'avatar',
        'phone',
        'date_of_birth',
        'status'
    ];
}
