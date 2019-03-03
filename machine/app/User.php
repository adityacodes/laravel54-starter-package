<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'mobile', 'confirmation_code', 'confirmed',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    

    public function verified()
    {
        $this->confirmed = 1;
        $this->confirmation_code = null;
        
        $this->save();
    }

    
    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("name", "LIKE","%$keyword%")
                    ->orWhere("email", "LIKE", "%$keyword%")
                    ->orWhere("designation", "LIKE", "%$keyword%")
                    ->orWhere("mobile", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }   
    
}
