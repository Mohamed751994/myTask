<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Course;

class Category extends Model
{
	use SoftDeletes;
    protected $fillable = ['name', 'active'];
    protected $dates 	= ['deleted_at'];



    //Relation
    public function courses()
    {
        return $this->hasMany('App\Course', 'category_id');
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
