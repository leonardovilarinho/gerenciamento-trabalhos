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
    	return $this->belongsTo(Student::class, 'student_id', 'user_id');
    }

    public function submission()
    {
    	return $this->belongsTo(Submission::class, 'submission_id', 'id');
    }
}
