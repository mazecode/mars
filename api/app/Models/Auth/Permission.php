<?php namespace App\Models\Auth;

use App\Models\Base;

class Permission extends Base
{
    protected $table = 'permissions';
    protected $hidden = ['id'];
    protected $fillable = [];
}