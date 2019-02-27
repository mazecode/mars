<?php

namespace App\Validation\Rules;

use App\Models\Auth\User;
use Respect\Validation\Rules\AbstractRule;

class EmailAvailable extends AbstractRule
{
    
    public function validate($input)
    {
        return ! User::where('email', $input)->exists();
    }
}