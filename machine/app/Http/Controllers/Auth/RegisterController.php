<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB, Session;

use App\Notifications\UserRegistered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/validateuser';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('user_reg_status');
        $this->redirectTo = env('AFTER_LOGIN_URL');

    }

    public function showRegistrationForm(){
      return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, array(
            'name' => 'bail|required',
            'email' => 'bail|required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6'
            ), $messages = [
                'name.required' => '**The user name field is required.',
                'email.required' => '**The user email field is required.',
                'password.required' => '**The password field is required.',
                'unique' => '*Your email id already exists. Please login to continue.'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $confirmation_code = substr(md5(($data['email']).'giis') , 0, 20);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'confirmation_code' => $confirmation_code,
            'password' => bcrypt($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        // Laravel validation
        $validator = $this->validator($request->all());
        if ($validator->fails()){
            $this->throwValidationException($request, $validator);
        }
        
        DB::beginTransaction();
        try{
            $user = $this->create($request->all());
            $user->notify(new UserRegistered($user));
            DB::commit();
            Session::flash('success', 'A verification link has been sent to your registered email. Please verify to continue.');
            return redirect()->route('login');
        }
        catch(Exception $e){
            DB::rollback();
            Session::flash('error', 'Server is busy. Please try again after sometime.');
            return back();
        }
    }


    public function confirm($confirmation_code)
    {
        if(!$confirmation_code){
            return redirect()->route('login');
        }
        User::where('confirmation_code', $confirmation_code)->firstOrFail()->verified();
        Session::flash('success', 'You have been successfully verified! Please login to continue.');
        return redirect()->route('login');
    }
}
