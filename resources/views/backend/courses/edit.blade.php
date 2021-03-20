@extends('layouts.app')

@section('title')
	Edit {{$course->name}}
@endsection

@section('content')


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit {{$course->name}}</h1>
    <div class="float-right">
    	<a href="{{ route('courses.index') }}" class="btn btn-primary btn-user btn-block"> <i class="fa fa-home"></i> All Courses</a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <form class="user" action="" method="post" autocomplete="off" id="saveCourse">
            @csrf
            <div class="form-group">
                <div class="col-sm-12 mb-3 mb-sm-0">
                   <select name="category_id" id="category_id" class="form-control">
                      
                       @foreach($categories as $category)
                       <option value="{{$category->id}}" @if($category->id == $course->category_id) selected @endif>{{$category->name}}</option>
                       @endforeach
                   </select>
                    <span id="category_error" class="validation_errors"></span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="name" name="name" 
                        placeholder="Name" value="{{$course->name}}">
                    <span id="name_error" class="validation_errors"></span>
                </div>
            </div>

             <div class="form-group">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <textarea type="text" class="form-control form-control-user" id="description" name="description" 
                        placeholder="Description">{!!$course->description!!}</textarea>
                    <span id="description_error" class="validation_errors"></span>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <select class="form-control" id="rating" name="rating">
                        <option value="1" @if($course->rating == 1) selected @endif>1</option>
                        <option value="2" @if($course->rating == 2) selected @endif>2</option>
                        <option value="3" @if($course->rating == 3) selected @endif>3</option>
                        <option value="4" @if($course->rating == 4) selected @endif>4</option>
                        <option value="5" @if($course->rating == 5) selected @endif>5</option>
                    </select>
                    <span id="rating_error" class="validation_errors"></span>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <select class="form-control" id="levels" name="levels">
                        <option value="beginner" @if($course->levels == 'beginner') selected @endif>Beginner</option>
                        <option value="immediate" @if($course->levels == 'immediate') selected @endif>Immediate</option>
                        <option value="high" @if($course->levels == 'high') selected @endif>High</option>
                    </select>
                    <span id="levels_error" class="validation_errors"></span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="number" min="0" class="form-control form-control-user" id="views" name="views" placeholder="Views" value="{{ $course->views }}">
                    <span id="views_error" class="validation_errors"></span>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="number" min="0" class="form-control form-control-user" id="hours" name="hours" placeholder="Hours" value="{{ $course->hours }}">
                    <span id="hours_error" class="validation_errors"></span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">

                      <label class="btn btn-outline-danger @if($course->active == 'Off') active @endif ">
                        <input type="radio" name="active" id="option1" value="0" autocomplete="off" @if($course->active == 'Off') checked @endif > Off
                      </label>
                      <label class="btn btn-outline-success @if($course->active == 'On') active @endif ">
                        <input type="radio" name="active" id="option2" value="1" autocomplete="off" @if($course->active == 'On') checked @endif > On
                      </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-success btn-user btn-block" id="saveCourseSubmit">
                    <i class="fa fa-plus"></i> Update
                </button>      
            </div>                          
        </form>   
    </div>
</div>

@endsection


@include("scripts.updateCourse")