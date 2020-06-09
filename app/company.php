<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\comment;

class company extends Model
{
     protected $fillable=[  'id',
     	                   'name',
                           'description',
           
                           'user_id'
                           
                         ];
 public function user(){
        return $this->belongsTo('App\User');
    }
    public function projects(){
    	return $this->hasMany('App\project');
    }
     public function comments(){
        return $this->morphMany('App\comment','commentable');
    }
}
