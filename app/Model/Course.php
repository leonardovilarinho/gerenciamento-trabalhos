<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	protected $fillable = [
        'name',
        'abbreviation',
    ];

    public function disciplines()
    {
        return $this->belongsToMany(Discipline::class, 'rooms', 'course_id', 'discipline_id')
        ->withPivot(['teacher_id']);
    }
}
