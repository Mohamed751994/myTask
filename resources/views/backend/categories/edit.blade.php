@extends('layouts.app')

@section('title')
	Edit {{$category->name}}
@endsection

@section('content')


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit {{$category->name}}</h1>
    <div class="float-right">
    	<a href="{{ route('categories.index') }}" class="btn btn-primary btn-user btn-block"> <i class="fa fa-home"></i> All Categories</a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <form class="user" action="" method="post" autocomplete="off" id="saveCategory" data-attr="update">
        	@csrf
            <div class="form-group">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="name" name="name" 
                        placeholder="Name" value="{{$category->name}}">
                    <span id="name_error" class="validation_errors"></span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">

                      <label class="btn btn-outline-danger @if($category->active == 'Off') active @endif ">
                        <input type="radio" name="active" id="option1" value="0" autocomplete="off" @if($category->active == 'Off') checked @endif > Off
                      </label>
                      <label class="btn btn-outline-success @if($category->active == 'On') active @endif ">
                        <input type="radio" name="active" id="option2" value="1" autocomplete="off" @if($category->active == 'On') checked @endif > On
                      </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-success btn-user btn-block" id="saveCategorySubmit">
                    <i class="fa fa-plus"></i> Update
                </button>      
            </div>                          
        </form>     
    </div>
</div>

@endsection


@include("scripts.updateCategory")