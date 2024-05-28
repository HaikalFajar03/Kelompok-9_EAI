<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Assuming your user model is named User

class UserController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        // Retrieve all users from the database
        $users = User::where('fullname', 'LIKE','%'.$keyword.'%')
            ->orWhere('username', 'LIKE','%'.$keyword.'%')
            ->orWhere('user_type', 'LIKE', '%'.$keyword.'%')
            ->paginate(5);

        // Pass the $users variable to the view
        return view('pengaturanadmin', ['users' => $users]);
    }
}
