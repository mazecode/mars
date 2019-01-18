<?php namespace App\Models\Auth;

class GroupPermission extends \App\Models\Base
{
    protected $table = 'groups_permissions';
    protected $hidden = ['id'];
    protected $fillable = [];
}