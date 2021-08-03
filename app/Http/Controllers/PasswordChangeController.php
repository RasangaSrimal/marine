<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;

class PasswordChangeController extends Controller
{
    public function index()
    {
        return view('auth/passwords/change');
    }

    public function changePassword(Request $request)
    {
        $requestData = $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        $userId = Auth::User()->id;
        $user = User::find($userId);
        $user->password = Hash::make($requestData['new_password']);;
        $user->save();
        return back()->with('message', 'Your password has been updated successfully.');
    }

}
