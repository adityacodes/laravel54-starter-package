<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Auth, App\Admin, File, Session;

class AdminController extends Controller
{
    protected $uploadPath = 'admindata/users';

    protected $vars = array();

    public function __construct()
    {
      $this->vars = array(
        'USER_REGISTRATION'=> env('USER_REGISTRATION'),
        'APP_NAME'        => env('APP_NAME'),
        'MAIL_DRIVER'     => env('MAIL_DRIVER'),
        'MAIL_HOST'       => env('MAIL_HOST'),
        'MAIL_PORT'       => env('MAIL_PORT'),
        'MAIL_USERNAME'   => env('MAIL_USERNAME'),
        'MAIL_PASSWORD'   => env('MAIL_PASSWORD'),
        'MAIL_ENCRYPTION' => env('MAIL_ENCRYPTION'),
    );
    }
    
    public function getAllUsers()
    {

    	$users = User::orderBy('id', 'desc')->paginate(20);
    	return view('admin.users')
              ->with('uploadPath', $this->uploadPath)
              ->withUsers($users);
    }

    public function getEditUser($id)
    {
      $user = User::find($id);
      $keys  = array_keys((array)$user['attributes']);

      return view('admin.edituser')->with('keys', $keys)->with('user', $user);
    }

    public function getShowUser($id)
    {
      $user = User::find($id);
      $keys  = array_keys((array)$user['attributes']);

      return view('admin.edituser')->with('keys', $keys)->with('user', $user);
    }

    public function postEditUser(Request $request, $id)
    {
        $imginpname = 'avatar';

        $this->validate($request, array(
              'first_name'          =>'required',
              'email'               =>'required',
              'mobile'              =>'required',
              'last_name'           =>'required',
              'avatar'              =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
              'website'             =>'required', 
              'city'                =>'required',
              'country'             =>'required',
              'confirmation_code'   =>'required',
              'confirmed'           =>'required|boolean'
        ));


        $user = User::find($id);


        if($request->hasFile($imginpname))
        {
                if ($request->file($imginpname)->isValid()) 
                {
                    File::delete($user->imginpname);
                    $imageName = time().rand(5000,10000).'.'.$request->$imginpname->getClientOriginalExtension();
                    $request->$imginpname->move($this->uploadPath, $imageName);    
                    $user->$imginpname = $this->uploadPath.'/'.$imageName;  
                }
                else 
                {
                  Session::flash('warning', 'Uploaded file is not valid.');
                  return back()->withErrors($validator)->withInput();
                }
          }

       
        $user->first_name       = $request->first_name;  
        $user->email            = $request->email;        
        $user->mobile           = $request->mobile;
        $user->last_name        = $request->last_name;
        $user->website          = $request->website;
        $user->city             = $request->city;
        $user->country          = $request->country;
        $user->confirmation_code= $request->confirmation_code;
        $user->confirmed        = $request->confirmed;
        $user->save();

        return redirect()->route('admin.users');
    }


    public function searchuser($keyword = null)
    {
        if(isset($keyword) && !empty($keyword))
        {
          $users = User::SearchByKeyword($keyword)->limit(5)->get();
          foreach($users as $user)
          {
              $part1 = "<tr>
              <td>".$user->id."</td>
              <td>".$user->name."</td>
              <td>".$user->email."</td>
              <td>".$user->mobile."</td>
              <td>".$user->confirmed."</td>";
              $part2 = "<td><a href='".route('admin.user.show', $user->id)."' class='btn btn-sm btn-info'><i class='fa fa-eye'></i> SHOW</a>.";
              $part3 = "<a href='".route('admin.user.edit', $user->id)."' class=\"btn btn-sm btn-danger\"><i class='fa fa-pencil'></i> EDIT</a></td></tr>";
              echo $part1.$part2.$part3;
          }
          
        }
    }

    public function getProfile()
    {
      $adminid = Auth::guard('admin')->user()->id;
      $admin = Admin::where('id', $adminid)->first();
      $keys  = array_keys((array)$admin['attributes']);
      return view('admin.profile')
                ->with('keys', $keys)
                ->with('admin',$admin);
    }
    
    public function postProfile(Request $request)
    {
      $admin_id = Auth::guard('admin')->user()->id;
      $vars = array(
          'name'=>'required',
          'email'=>array('required',  Rule::unique('admins')->ignore($admin_id)),
          'first_name'=>'required',
          'last_name'=>'required',
          'city'=>'required',
          'country'=>'required',
      );
      $this->validate($request, $vars);

      $admin = Admin::find($admin_id);

      foreach (array_keys($vars) as $key) {
          $admin->$key = $request->$key;
      }
      $admin->save();

      return redirect()->route('admin.profile');

    }

    public function getDashboard()
    {
      return view('admin.dashboard');
    }

    public function getSettings()
    {
      return view('admin.settings')->with('var', $this->vars);
    }


    public function postSettings(Request $request)
    {
      $this->validate($request, array(
          'USER_REGISTRATION' => 'required|boolean|alpha_dash',
          'APP_NAME'          => 'required|alpha_dash',
          'MAIL_DRIVER'       => 'sometimes|regex:/^\S*$/u',
          'MAIL_HOST'         => 'sometimes|regex:/^\S*$/u',
          'MAIL_PORT'         => 'sometimes|numeric',
          'MAIL_USERNAME'     => 'sometimes|regex:/^\S*$/u',
          'MAIL_PASSWORD'     => 'sometimes|regex:/^\S*$/u',
      ));
      
      
      foreach ($request->except('_token','submit') as $key => $value) 
      {
        if(env($key) != $value){
          $this->setEnvironmentValue($key, $value);
        }
      }
      return redirect()->route('admin.settings');
    }



    public function addUsers(Request $request)
    {
      $user = new User;
      $user->name = $request->name;
      $user->password = $request->password;
      $user->email = $request->email;
      $user->confirmed = 1;
      $user->role_id = 1;
      $user->save();
    }





    private function setEnvironmentValue($key, $value)
    {
      $path = base_path('.env');

      $old = env($key);

      if (file_exists($path)) {
        
          file_put_contents($path, str_replace(
              "$key=".$old, "$key=".$value, file_get_contents($path)
          ));
          
      }
      
      

      
   }


}
