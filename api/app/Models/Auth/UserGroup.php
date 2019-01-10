<?php namespace App\Models\Auth;

class GroupPermission extends Base
{
    protected $table = 'tool_users';
    protected $hidden = ['id'];
    protected $fillable = [];
}