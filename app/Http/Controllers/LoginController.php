<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

use App\Http\Controllers\AdminController;




class LoginController extends Controller
{
    public $AdminController;

    function __construct()
    {
        $this->AdminController = new AdminController;
    }

    public function index()
    {

        return view('login');
    }

    public function user_login(Request $request)
    {
        // dd($request);
        $validete = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validete->fails()) {
            return back();
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => "admin"])) {
            return redirect()->route("admin");
        } elseif (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => "user"])) {
            return redirect()->route("/");
        } else {
            return redirect()->route('login')->withInput()->withErrors('email and password không đúng');
        }
        return back()->withInput();
    }
}
