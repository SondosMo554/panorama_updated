<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $username = 'admin';
    $password = '123';

    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    if ($request->input('username') === $username && $request->input('password') === $password) {
        $request->session()->put('authenticated', true);
        $request->session()->flash('success', 'You have successfully logged in!'); // Add this line

        return redirect()->route('admin_home');
    } else {
        return redirect()->back()->withErrors(['error' => 'Invalid username or password.']);
    }
}




}
