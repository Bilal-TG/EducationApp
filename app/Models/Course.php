<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    
    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
    
    public function getLessons(){
        return $this->hasMany(Lesson::class);
    }
}
