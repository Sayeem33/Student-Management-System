<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin', compact('users'));
    }

    public function makeAdmin($id)
    {
        $user = User::findOrFail($id);
        
        if ($user->is_admin) {
            return redirect()->back()->with('error', 'User is already an admin.');
        }

        $user->is_admin = true;
        $user->save();

        return redirect()->back()->with('success', 'User has been promoted to admin successfully!');
    }
}
