<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use Illuminate\View\View;

use App\Http\Controllers\AdminController;




class LoginController extends Controller
{
    public $AdminController;

    function __construct()
    {
        $this->AdminController = new AdminController;
    }

    // public function validates($data)
    // {
    //     return Validated::make($data, []);
    // }

    public function index(Request $request)
    {
        if ($request->method('post')) {
            $user_token = $request->_token;
            $user_email = $request->Email;
            $user_pass = $request->Password;
        }
        return view('login');
    }

    // public function user_login(Request $request)
    // {
    //     $user_token = $request->_token;
    //     $user_email = $request->Email;
    //     $user_pass = $request->Password;


    //     $admin_login_email = DB::table('users')->where('email', $user_email)->value('email');
    //     if (isset($admin_login_email)) {
    //         echo $admin_login_email;
    //     } else {
    //         Session::put('error_login_mess', 'email is not correct');
    //         return redirect()->route("login");
    //     }
    //     // ->where('password', $user_pass)->where('role', 'admin')->first();
    //     // if (isset($admin_login)) {
    //     //     return redirect()->route('admin');
    //     //     // echo "thaychisnh";

    //     // } else {
    //     //     echo "sai";
    //     // }
    // }
}
