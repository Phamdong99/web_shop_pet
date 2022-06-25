<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Member extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password'
    ];
}
