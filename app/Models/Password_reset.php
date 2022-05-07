<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
class Password_reset extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'email',
        'token',
    ];
    const UPDATED_AT = null;
    protected $primaryKey = 'email';
    public $incrementing = false;
}
