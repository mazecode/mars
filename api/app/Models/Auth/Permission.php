<?php namespace App\Models\Auth;

class Permission extends App\Models\Base
{
    protected $table = 'tool_users';
    protected $hidden = ['id'];
    protected $fillable = [];
}