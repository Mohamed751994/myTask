<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;
use Validator;
use DataTables;
use App\Http\Requests\CategoryRequest;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    //all Categories
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::latest()->get();
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
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="'.route("category.edit", $row->id).'" id="'.$row->id.'"  class="edit  btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>';
                           $btn .= ' <a href="#" id="'.$row->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action', 'active'])
                    ->make(true);
        }
      
        return view('backend.categories.index');
    }


    //create Category
    public function create()
    {
    	return view('backend.categories.create');
    }


    //store Category
    public function store(CategoryRequest $request)
    {
        // Data
	    $data = array(
	    	'name' 	 => $request->name,
	    	'active' => $request->active,
	    );
	    Category::create($data);
	    return response()->json(array('success' => true));
    }


    //edit Category
    public function edit($id)
    {
    	$category = Category::findOrFail($id);
    	return view('backend.categories.edit', compact('category'));
    }


    //Update Data
     function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $data = array(
            'name' 	 => $request->name,
	    	'active' => $request->active,
        );
        Category::whereId($id)->update($data);
	    return response()->json(array('success' => true));
    }





    //Delete Data
    function destroy(Request $request)
    {
        $category = Category::find($request->input('id'));
        if($category->delete())
        {
            //Delete all courses related with category deleted id
            $category->courses()->delete();
            return response()->json(array('success' => true));
        }
        
    }




}
