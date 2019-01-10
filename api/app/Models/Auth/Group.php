<?php namespace App\Models\Auth;

class Group extends App\Models\Base
{
    protected $table = 'tool_users';
    protected $hidden = ['id'];
    protected $fillable = [];
}