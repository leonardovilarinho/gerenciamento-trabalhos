<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    public $timestamps = false;

    protected $fillable = [
    	'mimetype',
    	'file',
    	'protocol',
    	'value',
    	'work_id',
    ];

    public function work()
    {
    	return $this->belongsTo(Work::class, 'work_id', 'id');
    }

    public function students()
    {
        return $this->hasMany(SubmissionStudent::class, 'submission_id', 'id');
    }
}
