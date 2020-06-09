<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\comment;

class project extends Model
{
    protected $fillable=[  'name',
                           'description',
                            'days',
                            'user_id',
                            'company_id',

                         ];

public function users(){
        return $this->belongsToMany('App\User');
    }
    
    public function company(){
        return $this->belongsTo('App\company');
    }
    public function comments(){
        return $this->morphMany('App\comment','commentable');
    }

}
