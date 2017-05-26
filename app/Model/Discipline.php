<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    protected $fillable = [
        'name',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'courses_disciplines', 'discipline_id', 'course_id');
    }
}
