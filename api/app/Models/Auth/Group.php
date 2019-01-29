<?php namespace App\Models\Auth;

use App\Models\Base;
class Group extends Base
{
    protected $table = 'groups';
    protected $hidden = ['id'];
    protected $fillable = [];
}