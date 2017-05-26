<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
    	'id',
    	'name',
    	'username',
    	'email',
    	'password',
    ];

    protected $hidden = ['password', 'remember_token'];

    public function manager()
    {
    	return $this->hasOne(Manager::class, 'user_id', 'id');
    }

    public function getRememberToken() { return ''; }

    public function setRememberToken($value) { }

    public function getRememberTokenName() { return 'trash_attribute'; }

    public function setTrashAttributeAttribute($value) { }
}
