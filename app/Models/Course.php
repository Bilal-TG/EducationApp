<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $fillable = [
        'title', 'description', 'add_time', 'keywords', 'price', 'sale_price', 'status', 'featured', 'popular', 'class_id', 'subject_id', 'course_image', 'intro_video'
         
    ];

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