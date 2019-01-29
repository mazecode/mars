<?php namespace App\Models\Auth;

use App\Models\Base;
class UserPermission extends Base
{
	protected $table = 'user_permissions';
	protected $hidden = ['id'];
    protected $fillable = [];
}