<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use App\comment;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email',
         'password',
         'first_name',
         'middle_name',
         'last_name',
         'city',
         'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tasks(){
        return $this->belongsToMany('App\task');
    }
    
    public function role(){
        return $this->belongsTo('App\role');
    }
    public function companies(){
        return $this->hasMany('App\company');
    }
    public function projects(){
        return $this->belongsToMany('App\project');
    }
     public function comments(){
        return $this->morphMany('App\comment','commentable');
    }
}
