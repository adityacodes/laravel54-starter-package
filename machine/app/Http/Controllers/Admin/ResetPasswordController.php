<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    //trait for handling reset Password
    use ResetsPasswords;

    protected $redirectTo = '/admin/dashboard';

    public function __construct()
    {
      $this->redirectTo = env('ADMIN_AFTER_LOGIN_URL');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('admin.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function broker()
    {
        return Password::broker('admins');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function sendResetResponse($response)
    {
        return redirect()->route('admin.dashboard')->with('status', trans($response));
    }
}
