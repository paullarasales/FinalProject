<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Organizer extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'email',
        'password',
        'usertype',
        'position'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
