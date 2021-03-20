<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Course;
use Carbon\Carbon;
use DB;

class HomePageController extends Controller
{
	//Home Page [All Courses]
    public function index()
    {
    	$categories = Category::whereActive(1)->get();
    	$courses    = Course::whereActive(1)->latest()->paginate(PAGINATION_COUNT);
    	return view('homePage', compact('categories', 'courses'));
    }




    //Filter Courses method
    public function filterCourses(Request $request)
    {
    	
    	$query = Course::whereActive(1);

    	// Category
        if($request['category']!=''){
          $query->whereIn('category_id', $request['category']);
        }
        // Rating
        if($request['rating']!=''){
          $query->whereIn('rating', $request['rating']);
        }
        // Levels
        if($request['levels']!=''){
          $query->whereIn('levels', $request['levels']);
        }

        //time
    	//Less than 4 hours
    	if ($request['time'] == [4]) 
    	{
    		$query->where('created_at', '>', Carbon::now()->subHours(4)->toDateTimeString());
    	}
    	//less than 8 hours
    	if ($request['time'] == 8) 
    	{
    		$query->where('created_at', '>', Carbon::now()->subHours(8)->toDateTimeString());
    	}
    	//more than 8 hours
    	if ($request['time'] == 9) 
    	{
    		$query->where('created_at', '>=', Carbon::now()->subHours(9)->toDateTimeString());
    	}

        $content = $query->latest()->get();

        $htmlContent ='';
        foreach ($content as $course) {
         $htmlContent .='<div class="col-md-4 mt-3">
						   <div class="card">
						    <span class="category">'.$course->category->name.'</span>
						    <div class="image"></div>
						    <div class="card-body">
						      <h5><a href="#">'.$course->name.'</a></h5>
						      <p class="card-text">
						      '. \Illuminate\Support\Str::words($course->description, 12) .'</p>
						      <div class="course_rating">';
			for ($i=1; $i <= $course->rating; $i++) 
			{ 
				$htmlContent .='<span class="fa fa-star stars"></span>';
			}
			$htmlContent .= '<span class="views">('.$course->views.')</span></div></div></div></div>'; 
        }
        return response()->json(array('success' => $htmlContent, true)); 
    }
    // End filter courses



    //search with pagination
    function ajaxPagination(Request $request)
    {
     if($request->ajax())
     {
      $courses = Course::whereActive(1)->where('name','LIKE','%'.$request->search."%")->latest()->paginate(PAGINATION_COUNT);
      return view('courses', compact('courses'))->render();
     }
    }
    // End

}
