<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                if ($user) {
                    return redirect('/admin/dashboard');
                } else {
                    Auth::logout();
                    return redirect('/home')->with('error', 'Access Denied. Admins only.');
                }
            }

            return back()->with('error', 'Invalid credentials');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error while login user',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}
