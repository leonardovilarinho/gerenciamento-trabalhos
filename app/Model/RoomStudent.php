<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoomStudent extends Model
{
    public $timestamps = false;
    public $table = 'rooms_students';

    protected $fillable = [
    	'student_id',
    	'room_id'
    ];

    public function room()
    {
    	return $this->belongsTo(Room::class, 'room_id', 'id');
    }

    public function student()
    {
    	return $this->belongsTo(User::class, 'student_id', 'id');
    }
}
