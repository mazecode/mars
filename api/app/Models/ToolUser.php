<?php namespace App\Models;

class ToolUser extends Base
{
    protected $table = 'tool_users';
    protected $hidden = [
        // 'id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $fillable = [
        'name',
        'surnames',
        'email',
        'username',
        'password',
        'acd',
        'team_leader',
        'agency',
        'service',
        'segment',
        'active',
        'id_role',
        'location',
        'is_fijo',
        'team_admin',
        'created_at',
        'updated_at'
    ];

    public function setUsernameAttribute($value)
    {
        $this->attributes['username'] = strtolower($value);
    }
}