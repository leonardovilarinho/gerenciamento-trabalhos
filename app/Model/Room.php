<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
	public $timestamps = false;

    protected $fillable = [
    	'teacher_id',
    	'course_id',
    	'discipline_id'
    ];

    public function course()
    {
    	return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function discipline()
    {
    	return $this->belongsTo(Discipline::class, 'discipline_id', 'id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }

    public function students()
    {
        return $this->hasMany(RoomStudent::class, 'room_id', 'id');
    }

    public function works()
    {
        return $this->hasMany(Work::class, 'room_id', 'id');
    }
}
