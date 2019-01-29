<?php namespace App\Models\Auth;

use App\Models\Base;

class User extends Base
{
    protected $table = 'users';
    protected $hidden = [
        'id',
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
        'access_token',
        'pwd_update',
        'pwd_history',
        'created_at',
        'updated_at'
    ];

    public function setUsernameAttribute($value)
    {
        $this->attributes['username'] = strtolower($value);
    }

    public static function fake() {
        return json_decode('[{
            "ID" : 28390,
            "USERNAME" : "dummy",
            "PASSWORD" : "d6f3db3ff95a346dc5d07946a0bc48e7",
            "DATECREATED" : "2018-11-27T14:51:23Z",
            "DATELASTMODIFIED" : "2019-01-16T10:16:55Z",
            "EMAIL" : null,
            "NAME" : "Dummy",
            "SURNAMES" : "Tester",
            "ACD" : null,
            "HEAD_SERVICE" : null,
            "TEAM_LEADER" : 28296,
            "AGENCY" : null,
            "SERVICE" : "BAJAS:PORTA",
            "SEGMENT" : "PREPAGO:FIJO.AMDOCS",
            "ACTIVE" : 1,
            "ID_ROLE" : 1,
            "IS_BUDGET_AVAILABLE" : 0,
            "LOCATION" : "ZARAGOZA",
            "IS_FIJO" : 0,
            "TEAM_ADMIN" : "28296:28296:23595:1172:28296:28296:28296:28296:28296",
            "WITH_API" : null,
            "ACCESS_TOKEN" : null,
            "PWD_UPDATE" : "2018-12-27T16:06:56Z",
            "PWD_HISTORY" : "0a382378090a5d03bc6411552a75f1c0;"
        }]');
    }
}