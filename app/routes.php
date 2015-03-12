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


	Route::get('notices',['as'=> 'notice.index','uses'=>'NoticeController@index']);
	Route::get('notices/create',['as'=> 'notice.create','uses'=>'NoticeController@create']);
	Route::post('notices',['as'=> 'notice.store','uses'=>'NoticeController@store']);
	Route::get('notices/{id}/edit',['as'=> 'notice.edit','uses'=>'NoticeController@edit']);
	Route::put('notices/{id}',['as'=> 'notice.update','uses'=>'NoticeController@update']);
	Route::delete('notices/{id}',['as'=> 'notice.delete','uses'=>'NoticeController@destroy']);
});

