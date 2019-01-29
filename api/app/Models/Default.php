<?php namespace App\Models;

use App\Models\Base;
class Defaults extends Base
{
    protected $table = '';
    protected $hidden = ['id'];
    protected $fillable = [];

    function __construct() {
        
    }
}