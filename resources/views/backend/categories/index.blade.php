@extends('layouts.app')

@section('title')
	All Categories
@endsection


@push('dataTable')

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

@endpush


@section('content')


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <h1 class="h3 mb-0 text-gray-800">All Categories</h1>
    <div class="float-right">
    	<a href="{{ route('category.create') }}" class="btn btn-success btn-user btn-block"> <i class="fa fa-plus"></i> Create</a>
    </div>
</div>

<div class="row">

    <div class="col-sm-12">
    	<table class="table table-bordered data-table" id="category_table" >
	        <thead>
	            <tr>
	                <th>#</th>
	                <th>Name</th>
	                <th>Active</th>
	                <th width="100px">Action</th>
	            </tr>
	        </thead>
	        <tbody>
	        </tbody>
	    </table>
    </div>

</div>



@endsection


<!-- Scripts views/scripts/ -->
@include('scripts.categoryScripts')