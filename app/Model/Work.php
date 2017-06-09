<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
    	'title',
    	'value',
    	'term',
    	'comment',
    	'room_id'
    ];

    public function room()
    {
    	return $this->belongsTo(Room::class, 'room_id', 'id');
    }
}
