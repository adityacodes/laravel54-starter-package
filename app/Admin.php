<?php

namespace App;
//Trait for sending notifications in laravel

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPasswordNotification;


class Admin extends Authenticatable
{
	// This trait has notify() method defined
  	use Notifiable;

	protected $fillable = [
		'name', 'email', 'password',
	];

	//hidden attributes
	protected $hidden = [
	   'password', 'remember_token',
	];

	//Send password reset notification
	public function sendPasswordResetNotification($token)
	{
		$this->notify(new AdminResetPasswordNotification($token));
	}
}
