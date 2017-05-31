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
    	'discipline_id',
    	'course_id'
    ];

    public function course()
    {
    	return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
