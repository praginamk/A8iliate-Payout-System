<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
   public function index()
   {
    $loggedInUser = Auth::user();
    $data = $loggedInUser->descendants()->where('role', 'user')->get();
   return view('admin.user.index',compact('data'));
   }
   public function adduser()
   {
    return view('admin.user.add');
   }
   public function storeuser(Request $request)
   {
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'parent_id' => Auth::id(),  // Seting authenticated userid as parent_id
        ]);

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }
   }
   public function deleteuser($id)
   {
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->route('user.index')->with('success', 'User deleted successfully.');
   }
}
