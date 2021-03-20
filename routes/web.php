<?php



define('PAGINATION_COUNT', 12);


Route::get('/', 'HomePageController@index')->name('homePage');
Route::get('/filterCourses', 'HomePageController@filterCourses')->name('filterCourses');


//pagination
Route::get('/pagination/search', 'HomePageController@ajaxPagination');


// Admin Routes //

Auth::routes(['register' => false]);
Route::prefix('admin')->group(function(){

	Route::get('/dashboard', 'HomeController@index')->name('dashboard');

	//Categories
	Route::get('/categories', 'CategoryController@index')->name('categories.index');
	Route::get('/category/create', 'CategoryController@create')->name('category.create');
	Route::post('/category/store', 'CategoryController@store')->name('category.store');
	Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
	Route::post('/category/update/{id}', 'CategoryController@update')->name('category.update');
	Route::get('/category/destroy', 'CategoryController@destroy')->name('category.destroy');


	//courses
	Route::get('/courses', 'CourseController@index')->name('courses.index');
	Route::get('/course/create', 'CourseController@create')->name('course.create');
	Route::post('/course/store', 'CourseController@store')->name('course.store');
	Route::get('/course/edit/{id}', 'CourseController@edit')->name('course.edit');
	Route::post('/course/update/{id}', 'CourseController@update')->name('course.update');
	Route::get('/course/destroy', 'CourseController@destroy')->name('course.destroy');


});
