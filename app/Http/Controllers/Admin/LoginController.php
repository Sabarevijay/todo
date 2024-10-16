<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showRegistrationForm()
{
    return view('admin.auth.register'); // Create this view file
}
    public function showLoginForm()
    {
        return view('admin.auth.login');  // Ensure you have this view file
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('tasks.index'); // Redirect to Filament panel
        }

        return redirect()->back()->withErrors(['error' => 'Invalid credentials']);
}
public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255', // Add validation for name
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:2|confirmed',
    ]);

    User::create([
        'name' => $request->name, // Include the name in the user creation
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('admin.login')->with('success', 'Registration successful. Please login.');
}
public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login'); // Redirect to the login page
    }
public function admin()
    { 
        $users = User::all();
        return view('admin.auth.admin',['users' => $users]);
    }

    public function destroy($id)
    {
       
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.admin')->with('success', 'User deleted successfully');
    }
    

}
