<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $akses = auth()->user()->akses;
            if ($akses === 'Superadmin') return redirect()->route('admin');
            auth()->logout();
        }

        return redirect()->route('login');
    }
    //
}
