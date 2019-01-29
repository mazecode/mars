<?php namespace App\Models\Auth;

use App\Models\Base;
class GroupPermission extends Base
{
    protected $table = 'groups_permissions';
    protected $hidden = ['id'];
    protected $fillable = [];
}