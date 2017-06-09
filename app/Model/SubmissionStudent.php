<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubmissionStudent extends Model
{
    public $timestamps = false;

    public $table = 'submissions_students';

    protected $fillable = [
    	'student_id',
    	'submission_id',
    ];

    public function student()
    {
    	return $this->belongsTo(Student::class, 'user_id', 'student_id');
    }

    public function submission()
    {
    	return $this->belongsTo(Submission::class, 'id', 'submission_id');
    }
}
