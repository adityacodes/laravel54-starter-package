<?php

namespace App\Http\Controllers\Admin;

use App\Admin, Auth, Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{


	protected $redirectPath = 'admin/dashboard';


    public function __construct()
    {
      $this->redirectTo = env('ADMIN_AFTER_LOGIN_URL');
    }

	public function showRegistrationForm()
	{
	  return view('admin.auth.register');
	}

	public function register(Request $request)
    {

        $this->validator($request->all())->validate();
        $admin = $this->create($request->all());
        $this->guard()->login($admin);

        Session::flash('success', 'You have successfully been registered as an admin.');
        return redirect($this->redirectPath);
    }


    //Validates user's Input
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:6|confirmed',
        ]);
    }


      //Create a new admin instance after a validation.
    protected function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

     //Get the guard to authenticate Admin
	protected function guard()
	{
		return Auth::guard('admin');
	}


}
