<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Course;
use App\Traits\GeneralTrait;

class APIController extends Controller
{

	//Trait
	use GeneralTrait;

    //show all categories
	public function showAllCategories()
	{
		$categories = Category::whereActive(1)->latest()->get();
		return $this->returnData('categories', $categories, 'success');
	}




	//show all courses
	public function showAllCourses()
	{
		$courses = Course::whereActive(1)->latest()->get();
		return $this->returnData('courses', $courses, 'success');
	}


}
