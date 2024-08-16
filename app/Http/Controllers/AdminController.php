<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->session()->has('authenticated')) {
            return redirect()->route('login');
        }

        return view('admin_home');
    }
}
