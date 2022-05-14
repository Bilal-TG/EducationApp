<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $fillable = [
        'class_id', 'title', 'icon'
    ];

    public function getCourses() {
        return $this->hasMany(Course::class);
    }
}