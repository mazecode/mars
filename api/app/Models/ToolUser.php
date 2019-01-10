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
        'created_at',
        'updated_at'
    ];
}