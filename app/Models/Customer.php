<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Customer extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
