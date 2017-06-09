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
    	return $this->belongsTo(Work::class, 'id', 'work_id');
    }
}
