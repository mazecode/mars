<?php namespace App\Models\Auth;

use App\Models\Base;
class UserGroup extends Base
{
    protected $table = 'user_groups';
    protected $hidden = ['id'];
    protected $fillable = [];
}