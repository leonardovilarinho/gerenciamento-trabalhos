<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public $timestamps = false;
	protected $primaryKey = 'user_id';

    protected $fillable = [ 'user_id' ];

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
