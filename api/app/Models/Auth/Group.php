<?php namespace App\Models\Auth;

class Group extends \App\Models\Base
{
    protected $table = 'groups';
    protected $hidden = ['id'];
    protected $fillable = [];
}