<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
	protected $redirectTo = '/admin/dashboard';

    use AuthenticatesUsers;

    public function __construct()
    {
      $this->redirectTo = env('ADMIN_AFTER_LOGIN_URL');
    }

    protected function guard()
    {
      return Auth::guard('admin');
    }

    //Shows admin login form
   public function showLoginForm()
   {
       return view('admin.auth.login');
   }
}
