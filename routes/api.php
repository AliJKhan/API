<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/createuser',function(){
	
	$email		 = Input::get('email');
	$password	 = Input::get('password');
	$name 		 = Input::get('name');


     Sentinel::register([

    'email'    => $email,
    'password' => $password,
    'name' => $name,

]); 

});



Route::post('/activateuser',function(){

	$email		 = Input::get('email');
	$password	 = Input::get('password');

	
$credentials = [
    'email'    => $email,
    'password' => $password,
];

Sentinel::activate($credentials);

    
});



Route::post('/getuser',function(){

	$email		 = Input::get('email');
	$password	 = Input::get('password');

	
$credentials = [
    'email'    => $email,
    'password' => $password,
];

return Sentinel::authenticate($credentials)->first();
    
});





Route::get('/test',function(){
return "It Works!";    
});


