<?php

Route::get('/', function(){
	return Redirect::route('dashboard');

});

/*before Login*/
Route::group(['before'=>'guest'],function(){
	/*AuthController*/
	Route::get('login',['as'=> 'login','uses'=>'AuthController@login']);
	Route::post('login',['as'=> 'doLogin','uses'=>'AuthController@doLogin']);


	/*Route::get('register',['as'=> 'register','uses'=>'AuthController@register']);
	Route::post('register',['as'=> 'doRegister','uses'=>'AuthController@doRegister']);*/
	/*AuthController*/
});

/*For All Logged In Users*/
Route::group(['before'=>'auth'],function(){
	/*AuthController*/
	Route::get('logout',['as'=> 'logout','uses'=>'AuthController@logout']);
	/*AuthController*/

	/*DashboardController*/
	Route::get('dashboard',['as'=> 'dashboard','uses'=>'DashboardController@home']);



    Route::get('password-reset',['as'=> 'passwordReset','uses'=>'AuthController@resetPassword']);
	Route::post('password-reset',['as'=> 'doPasswordReset','uses'=>'AuthController@doPasswordReset']);
	/*DashboardController*/

	/*UserController*/

	/*UserController*/



});


Route::group(['before'=>'auth|AdminTeacherStuff'],function(){

    //Notice Module
	Route::get('notices',['as'=> 'notice.index','uses'=>'NoticeController@index']);
	Route::get('notices/create',['as'=> 'notice.create','uses'=>'NoticeController@create']);
	Route::post('notices',['as'=> 'notice.store','uses'=>'NoticeController@store']);
	Route::get('notices/{id}/edit',['as'=> 'notice.edit','uses'=>'NoticeController@edit']);
	Route::put('notices/{id}',['as'=> 'notice.update','uses'=>'NoticeController@update']);
	Route::delete('notices/{id}',['as'=> 'notice.delete','uses'=>'NoticeController@destroy']);

	//Department Module

	Route::get('departments',['as'=> 'department.index','uses'=>'DepartmentController@index']);
	Route::get('department/create',['as'=> 'department.create','uses'=>'DepartmentController@create']);
	Route::post('department',['as'=> 'department.store','uses'=>'DepartmentController@store']);
	Route::get('department/{id}/edit',['as'=> 'department.edit','uses'=>'DepartmentController@edit']);
	Route::put('department/{id}',['as'=> 'department.update','uses'=>'DepartmentController@update']);
	Route::delete('departments/{id}',['as'=> 'department.delete','uses'=>'DepartmentController@destroy']);



    //Result Module
    Route::get('results',['as'=> 'result.index','uses'=>'ResultController@index']);
    Route::get('results/create',['as'=> 'result.create','uses'=>'ResultController@create']);
    Route::post('results',['as'=> 'result.store','uses'=>'ResultController@store']);
    Route::get('results/{id}/edit',['as'=> 'result.edit','uses'=>'ResultController@edit']);
    Route::put('results/{id}',['as'=> 'result.update','uses'=>'ResultController@update']);
    Route::delete('results/{id}',['as'=> 'result.delete','uses'=>'ResultController@destroy']);


    //Contact Module
    Route::get('contact',['as'=> 'contact','uses'=>'ContactController@edit']);
    Route::put('contact',['as'=> 'contact.store','uses'=>'ContactController@update']);

    //Message Module
    Route::get('message/{designation}',['as'=> 'message','uses'=>'MessageController@edit']);
    Route::put('message',['as'=> 'message.store','uses'=>'MessageController@update']);

	//Events Module

	Route::get('events',['as'=> 'event.index','uses'=>'EventController@index']);
	Route::get('event/create',['as'=> 'event.create','uses'=>'EventController@create']);
	Route::post('event',['as'=> 'event.store','uses'=>'EventController@store']);
	Route::get('event/{id}/edit',['as'=> 'event.edit','uses'=>'EventController@edit']);
	Route::put('event/{id}',['as'=> 'event.update','uses'=>'EventController@update']);
	Route::delete('events/{id}',['as'=> 'event.delete','uses'=>'EventController@destroy']);
});

Route::get('test',function(){
	return Helpers::createDepartmentKey("Islamic Studies");
});

