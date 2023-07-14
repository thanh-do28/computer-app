<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function user_logout(Request $request)
    {
        // dd($request);
        Auth::logout();
        return redirect()->route('login');
    }
}
