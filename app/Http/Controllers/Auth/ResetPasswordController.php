<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class ResetPasswordController extends Controller
{
    //
    public function reset(User $user)
    {
        // Reset the user's password to "123456"
        $user->password = Hash::make('123456');
        $user->save();

        return redirect()->back()->with('success', 'Password reset successfully to 123456');
    }

}
