<?php namespace App\Models\Auth;

class Permission extends \App\Models\Base
{
    protected $table = 'permissions';
    protected $hidden = ['id'];
    protected $fillable = [];
}