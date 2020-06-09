<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\comment;

class task extends Model
{
     protected $fillable=[  'name',
                           'days',
                           'hours',
                           'project_id',
                           'user_id',
                           'company_id',
                           

                         ];

public function user(){
        return $this->belongsTo('App\user');
    }
    public function project(){
        return $this->belongsTo('App\project');
    }
    public function company(){
        return $this->belongsTo('App\company');
    }
    public function users(){
        return $this->belongsToMany('App\user');
    }
     public function comments(){
        return $this->morphMany('App\comment','commentable');
    }

}
