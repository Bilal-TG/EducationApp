<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Chapter extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    
    public function Lessons(){
        return $this->hasMany(Lesson::class);
    }
}
