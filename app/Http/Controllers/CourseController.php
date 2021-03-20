<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Course;
use Session;
use Validator;
use DataTables;
use App\Http\Requests\CourseRequest;


class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    //all courses
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Course::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('active', function($row){
                        if ($row->active == 'Off') 
                        {
                            $off = '<span class="bg-danger pl-2 pr-2 text-white">Off</span>';
                            return $off;
                        }
                        elseif ($row->active == 'On') 
                        {
                            $on = '<span class="bg-success pl-2 pr-2 text-white">On</span>';
                            return $on;
                        }   
                    })
                    ->addColumn('category_id', function($row){
                        $category = Category::findOrFail($row->category_id);
                        return $category->name;
                    })
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="'.route("course.edit", $row->id).'" id="'.$row->id.'"  class="edit  btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>';
                           $btn .= ' <a href="#" id="'.$row->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
     
                            return $btn;
                    })
                    
                    ->rawColumns(['action','active', 'category_id'])
                    ->make(true);
        }
      
        return view('backend.courses.index');
    }


    //create course
    public function create()
    {
        $categories = Category::whereActive(1)->get();
    	return view('backend.courses.create', compact('categories'));
    }


    //store course
    public function store(CourseRequest $request)
    {
        // Data
	    $data = array(
            'category_id'   => $request->category_id,
            'name'          => $request->name,
            'description'   => $request->description,
            'rating'        => $request->rating,
            'levels'        => $request->levels,
            'views'         => $request->views,
	    	'hours' 	    => $request->hours,
	    	'active'        => $request->active,
	    );
	    Course::create($data);
	    return response()->json(array('success' => true));
    }


    //edit course
    public function edit($id)
    {
    	$course = Course::findOrFail($id);
        $categories = Category::whereActive(1)->get();
    	return view('backend.courses.edit', compact('course', 'categories'));
    }


    //Update Data
     function update(CourseRequest $request, $id)
    {
        $course = Course::findOrFail($id);
        $data = array(
            'category_id'   => $request->category_id,
            'name'          => $request->name,
            'description'   => $request->description,
            'rating'        => $request->rating,
            'levels'        => $request->levels,
            'views'         => $request->views,
            'hours'         => $request->hours,
            'active'        => $request->active,
        );
        Course::whereId($id)->update($data);
	    return response()->json(array('success' => true));
    }





    //Delete Data
    function destroy(Request $request)
    {
        $course = Course::find($request->input('id'));
        if($course->delete())
        {
            return response()->json(array('success' => true));
        }
    }




}
