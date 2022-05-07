<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    
    public function getCourses() {
        return $this->hasMany(Course::class);
    }
}
