<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;


class user_profile extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    
        protected $fillable = [
        'gender',
        'institute',
        'email',
        'user_id',
        'pp_path',
        'number',
        'city',
        'FirstName',
        'LastName',
    ];
}
