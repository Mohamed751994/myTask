<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


use App\Category;

class Course extends Model
{
    use SoftDeletes;
    protected $fillable = ['category_id','name', 'description','rating','views','levels','hours','active'];
    protected $dates 	= ['deleted_at'];



    //Relation
    public function category()
    {
    	return $this->belongsTo('App\Category', 'category_id');
    }


    // ActiveAttribute [ 0 => Off - 1 => On ]
    public function getActiveAttribute($value)
    {
    	if ($value == 0) 
    	{
    		return 'Off'; 
    	}
    	elseif($value == 1)
    	{
    		return 'On';
    	}
        
    }


}
