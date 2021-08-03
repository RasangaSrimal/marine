<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Rule;

class MatchOldPassword implements Rule
{
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        $userPassword = Auth::User()->password;
        return Hash::check($value, $userPassword);
    }

    public function message()
    {
        return '既存のパスワードは一致しません。';
    }
}
