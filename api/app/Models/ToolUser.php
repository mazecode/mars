<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToolUser extends Model
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