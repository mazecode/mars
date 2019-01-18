<?php namespace App\Models\Auth;

class GroupPermission extends \App\Models\Base
{
    protected $table = 'users_groups';
    protected $hidden = ['id'];
    protected $fillable = [];
}