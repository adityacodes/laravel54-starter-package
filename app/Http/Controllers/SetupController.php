<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Artisan, Session;

class SetupController extends Controller 
{

  	private $form_var = array(
  		'class' => 'form-horizontal',
  		'id' => 'environment-form',
  		'other' => ''
  	);

  	private $routes = array(
  		'store_env' => 'store'
  	);

    private $formfields = array(

        'db_connection' => array(
        				        'name'  		    => 'db_connection',
                        'label_class' 	=> 'col-sm-3 col-form-label', 
                        'label_for' 	  => 'db_connection', 
                        'field_class' 	=> 'col-sm-9', 
                        'label' 		    => 'DB Connection',
                        'field_icon'  	=> 'fa fa-exchange',
                        'type'  		    => 'text', 
                        'default' 		  => 'mysql',
                        'extras'	     	=> array(
                        'class' 	      => 'form-control', 
                                         	'id' 		  => 'db_connection', 
                                         	'placeholder' => 'Enter db connection name here', 
                                         	'required' 	  => ''
                                        ),
                        'invalid_feed' 	=> 'Please provide a valid connection name.'
                        ),

        'db_host' => array(
        				        'name'  		=> 'db_host',
                        'label_class' 	=> 'col-sm-3 col-form-label', 
                        'label_for' 	=> 'db_host', 
                        'field_class' 	=> 'col-sm-9', 
                        'label' 		=> 'DB Host',
                        'field_icon' 	=> 'fa fa-server',
                        'type'  		=> 'text', 
                        'default' 		=> 'localhost',
                        'extras'		=> array(
                        					'class' 	  => 'form-control', 
                                         	'id' 		  => 'db_host', 
                                         	'placeholder' => 'Enter db host here', 
                                         	'required' 	  => ''
                                        ),
                        'invalid_feed' 	=> 'Please provide a valid host.'
                        ),

        'db_port' => array(
        				        'name'  		=> 'db_port',
                        'label_class' 	=> 'col-sm-3 col-form-label', 
                        'label_for' 	=> 'db_port', 
                        'field_class' 	=> 'col-sm-9', 
                        'label' 		=> 'DB Port',
                        'field_icon' 	=> 'fa fa-plug',
                        'type'  		=> 'text', 
                        'default' 		=> '3306',
                        'extras'		=> array(
                        					'class' 	  => 'form-control', 
                                         	'id' 		  => 'db_port', 
                                         	'placeholder' => 'Enter db port here', 
                                         	'required' 	  => ''
                                        ),
                        'invalid_feed' 	=> 'Please provide a valid port.'
                        ),

        'db_database' => array(
        				        'name'  		=> 'db_database',
                        'label_class' 	=> 'col-sm-3 col-form-label', 
                        'label_for' 	=> 'db_database', 
                        'field_class' 	=> 'col-sm-9', 
                        'label' 		=> 'DB Database',
                        'field_icon' 	=> 'fa fa-database',
                        'type'  		=> 'text', 
                        'default' 		=> null,
                        'extras'		=> array(
                        					'class' 	  => 'form-control', 
                                         	'id' 		  => 'db_database', 
                                         	'placeholder' => 'Enter database name here', 
                                         	'required' 	  => ''
                                        ),
                        'invalid_feed' 	=> 'Please provide a valid database name.'
                        ),

        'db_username' => array(
        				        'name'  		=> 'db_username',
                        'label_class' 	=> 'col-sm-3 col-form-label', 
                        'label_for' 	=> 'db_username', 
                        'field_class' 	=> 'col-sm-9', 
                        'label' 		=> 'DB UserName',
                        'field_icon' 	=> 'fa fa-user',
                        'type'  		=> 'text', 
                        'default' 		=> null,
                        'extras'		=> array(
                        					'class' 	  => 'form-control', 
                                         	'id' 		  => 'db_username', 
                                         	'placeholder' => 'Enter db username here', 
                                         	'required' 	  => ''
                                        ),
                        'invalid_feed' 	=> 'Please provide a valid username.'
                        ),

        'db_password' => array(
        				        'name'  		=> 'db_password',
                        'label_class' 	=> 'col-sm-3 col-form-label', 
                        'label_for' 	=> 'db_password', 
                        'field_class' 	=> 'col-sm-9', 
                        'label' 		=> 'DB Password',
                        'field_icon' 	=> 'fa fa-key',
                        'type'  		=> 'text', 
                        'default' 		=> null,
                        'extras'		=> array(
                        					'class' 	  => 'form-control', 
                                         	'id' 		  => 'db_password', 
                                         	'placeholder' => 'Enter db password here', 
                                         	'required' 	  => ''
                                        ),
                        'invalid_feed' 	=> 'Please provide a valid password.'
                        ),

        'maintenance_password' => array(
                        'name'      => 'maintenance_password',
                        'label_class'   => 'col-sm-3 col-form-label', 
                        'label_for'   => 'maintenance_password', 
                        'field_class'   => 'col-sm-9', 
                        'label'     => 'Maintenance Password',
                        'field_icon'  => 'fa fa-key',
                        'type'      => 'text', 
                        'default'     => null,
                        'extras'    => array(
                                  'class'     => 'form-control', 
                                          'id'      => 'maintenance_password', 
                                          'placeholder' => 'Enter maintenance password here', 
                                          'required'    => ''
                                        ),
                        'invalid_feed'  => 'Please provide a valid password.'
                        ),

        'maintenance_url' => array(
                        'name'      => 'maintenance_url',
                        'label_class'   => 'col-sm-3 col-form-label', 
                        'label_for'   => 'maintenance_url', 
                        'field_class'   => 'col-sm-9', 
                        'label'     => 'Maintenance URL',
                        'field_icon'  => 'fa fa-podcast',
                        'type'      => 'text', 
                        'default'     => null,
                        'extras'    => array(
                                  'class'     => 'form-control', 
                                          'id'      => 'maintenance_url', 
                                          'placeholder' => 'Enter maintenance url here', 
                                          'required'    => ''
                                        ),
                        'invalid_feed'  => 'Please provide a valid url.'
                        ),

        'admin_registration'=> array('name'  =>  'admin_registration',
                        'label_for'   => 'admin_registration', 
                        'label_class' => 'col-sm-3 col-form-label', 
                        'field_class' => 'col-lg-9', 
                        'label' => ' Admin Registration?',
                        'field_icon' => 'fa fa-user',
                        'type'  =>  'select', 
                        'default' => null,
                        'choices' => array('0' => 'Turned Off',
                                            '1' => 'Turn On'),
                        'extras'=> array('class' => 'form-control', 
                                         'id' => 'admin_registration', 
                                         'placeholder' => 'Admin Registration?', 
                                         'required' => ''
                                        ),
                        'invalid_feed'  => 'Please provide a valid admin reg.'
                        )
    );

	private $validation_rules = array(
                'db_connection' => 'required',
                'db_host'		=> 'required',
                'db_port'		=> 'required',
                'db_database'	=> 'required',
                'db_username'	=> 'required',
                'db_password' => 'required',
                'maintenance_password'  => 'required',
                'maintenance_url' => 'required',
                'admin_registration'	=> 'required'
            );
  
  	public function getStarted($otp)
  	{

  		$fields = $this->formfields;
  		$fields['db_database']['default'] = env('DB_DATABASE');
  		$fields['db_username']['default'] = env('DB_USERNAME');
      $fields['db_password']['default'] = env('DB_PASSWORD');
      $fields['maintenance_password']['default'] = env('MAINTENANCE_PASSWORD');
      $fields['maintenance_url']['default'] = env('MAINTENANCE_URL');
  		$fields['admin_registration']['default'] = (int)env('ADMIN_REGISTRATION');
  		$submitroute = 'storeenv';

  		$button = array(
  						'id'	=> 'submit',
  						'class'	=> 'pull-down btn-success btn-lg col-lg-10 col-md-offset-2 					col-xs-offset-3 text-center',
  						'title'	=> 'STORE ENVIRONMENT FILE'
  						);

  		return view('package.startinstall')
            ->with('fields', $fields)
  					->with('otp', $otp)
  					->with('button', $button)
  					->with('form_var', $this->form_var)
  					->with('submitroute', $submitroute);
  	}


  	public function postStarted(Request $request)
  	{
  		$this->validate($request, $this->validation_rules);

  		foreach($this->formfields as $field => $value)
  		{
  			$this->setEnvironmentValue(strtoupper($field), $request->$field);
        // echo strtoupper($field)."=".$request->$field."<br>";
  		}

  		// Test database connection
      try {
            Session::flash('firstinstall', "All set to true.");
            $this->migrateinstall();
            return redirect("/".$request->maintenance_url."/".$request->maintenance_password);

      } catch (\Exception $e) {
          return back()->withErrors(array('Error establishing connection to database'.$e->getMessage()));
      }


  	}


    public function getMaintenance($password)
    {
      $submitroute = 'postmn';
      $form_var = array(
                    'class' => 'form-horizontal',
                    'id'    => 'postmn',
                    'other' => '');
      $button = array(
                    'title' => 'START ACTION',
                    'class' => 'btn-success btn-md text-center',
                    'id'    => 'submit'
                  );
      return view('package.maintenance')
                  ->with('password', $password)
                  ->with('submitroute', $submitroute)
                  ->with('button', $button)
                  ->with('form_var', $form_var);
    }


    public function postMaintenance(Request $request)
    {
      $submitroute = 'postmn';
      $password = $request->password;
      $action = $request->action;
      $form_var = array(
                    'class' => 'form-horizontal',
                    'id'    => 'postmn',
                    'other' => '');
      $button = array(
                    'title' => 'START ACTION',
                    'class' => 'btn-success btn-md text-center',
                    'id'    => 'submit'
                  );

      try{
        $message = $this->$action();
        Session::flash('success', $message);
      }
      catch(Exception $e)
      {
        return back()->withErrors(array('Error!! '.$e->getMessage()));
      }
      return view('package.maintenance')
                  ->with('password', $password)
                  ->with('submitroute', $submitroute)
                  ->with('button', $button)
                  ->with('form_var', $form_var);
        
    }

    public function adminregon()
    {
      $this->setEnvironmentValue('ADMIN_REGISTRATION', 1);
      return 'Admin registration turned on successfully.';
    }

    public function adminregoff()
    {
      $this->setEnvironmentValue('ADMIN_REGISTRATION', 0);
      return 'Admin registration turned off successfully.';
    }


    public function clearcache()
    {
      $exitCode = Artisan::call('cache:clear');
      return 'Cache facade value cleared.';
    }

    public function optimize()
    {
      $exitCode = Artisan::call('optimize');
      return 'Reoptimized class loaders.';
    }

    public function clearroutes()
    {
        $exitCode = Artisan::call('route:clear');
        return 'Route cache cleared.';
    }

    public function clearviews()
    {

      $exitCode = Artisan::call('view:clear');
        return 'View cache cleared.';
    }

    public function clearconfig()
    {
      $exitCode = Artisan::call('config:clear');
        return 'Config cleared successfully.';
    }


    public function migrateinstall()
    {
      $exitCode = Artisan::call('migrate');
        return 'Database has been migrated.';
    }


    public function migraterollback()
    {
      $exitCode = Artisan::call('migrate:rollback');
        return 'Database has been rolled back.';
    }


    public function migratereset()
    {
      $exitCode = Artisan::call('migrate:reset');
        return 'Database has been reset.';
    }


    public function migraterefresh()
    {
      $exitCode = Artisan::call('migrate:refresh');
        return 'Database has been refreshed.';
    }


    public function dbseed()
    {
      $exitCode = Artisan::call('db:seed');
        return 'Database has been seeded.';
    }


    public function keygenerate()
    {
      $exitCode = Artisan::call('key:generate');
        return 'New key generated successfully.';
    }

    public function mton()
    {
      $exitCode = Artisan::call('down');
        return 'Maintenance mode is ON.';
    }


    public function mtoff()
    {
      Artisan::call('up');
      return 'Maintenance mode OFF.';
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

      if(strpos(file_get_contents($path), "$key=") === false)
      {
        file_put_contents($path, file_get_contents($path)."\n$key=".$value);
      }
   }

}
