<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\MasterController;
use Illuminate\Support\Facades\Log;


class AdminController extends Controller
{
    public function edit($id)
    {
    //     $notifPesans = $this -> pesanmasukIndex();
    // $notifPengajuans = $this ->pengajuanmasukIndex();
        $admin = User::findOrFail($id);
        return view('editadmin', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        // Log::info('Update Request Data: ' . json_encode($request->all()));

        // Validate the form data
        $request->validate([
            'fullname' => 'required',
            'username' => 'required',
            'user_type' => ['required', Rule::in(['Super Admin', 'Admin'])],
            'password' => 'sometimes|confirmed|min:6', // Only validate if a password is provided
        ]);

        // Log::info('Validated Data: ' . json_encode($request->all()));

        // Find the admin by ID
        $admin = User::findOrFail($id);

        // Update the user information
        $admin->update([
            'fullname' => $request->input('fullname'),
            'username' => $request->input('username'),
            'user_type' => $request->input('user_type'),
            'password' => $request->filled('password') ? bcrypt($request->input('password')) : $admin->password,
        ]);

        // Redirect to the admin settings page or wherever you want
        return redirect()->route('pengaturanadmin')->with('success', 'User updated successfully.');
    }
    public function create()
    {
        return view('tambahadmin');
    }

    public function store(Request $request)
    {
        // Log::info('Store Request Data: ' . json_encode($request->all()));

        // Validate the form data

        $request->validate([
            'username' => 'required|unique:users',
            'fullname' => 'required',
            'user_type' => ['required', Rule::in(['Super Admin', 'Admin'])],
            'password' => 'required|confirmed|min:6'
        ]);

        try {
        // Create a new user in the database
        User::create([
            'username' => $request->input('username'),
            'fullname' => $request->input('fullname'),
            'user_type' => $request->input('user_type'),
            'password' => bcrypt($request->input('password')),
        ]);

        } catch (\Exception $e) {
            // print wrong messge
            dd($e->getMessage());
        }

        // Redirect to the admin settings page or wherever you want
        return redirect()->route('pengaturanadmin')->with('success', 'Akun berhasil ditambahkan.');
    }
    public function destroy($id)
    {
        // Find the admin by ID
        $admin = User::findOrFail($id);

        // Delete the admin
        $admin->delete();

        // Redirect to the admin settings page or wherever you want
        return redirect()->route('pengaturanadmin')->with('success', 'Akun berhasil dihapus');
    }
        public function pengaturanadmin()
    {
        $users = User::all();
        return view('pengaturanadmin', compact('users'));
    }

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
