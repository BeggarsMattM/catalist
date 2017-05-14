<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home')->with('user', Auth::user() ? Auth::user()->email : null);
});

Route::post('login', ['before' => 'csrf', function()
{
  $email = Input::get('email');
  $password = Input::get('password');

  if (Auth::attempt(['email' => $email, 'password' => $password], true))
  {
    return Redirect::intended('dashboard');
  }
  return Redirect::to('/')->withErrors(['User not found. Have you registered?']);
}]);

Route::get('logout', function () {
  Auth::logout();
  return Redirect::to('/');
});

Route::post('register', ['before' => 'csrf', function()
{
  $validator = Validator::make(
    ['username' => Input::get('username'),
     'password' => Input::get('password'),
     'email' => Input::get('email'),
     'confirm-password' => Input::get('confirm-password')],
    ['username' => 'required',
     'password' => 'required|min:8|same:confirm-password',
     'email' => 'required|email|unique:users']
  );

  if ($validator->fails())
  {
    return Redirect::to('/')->withErrors($validator);
  }

  User::create([
    'email' => Input::get('email'),
    'password' => Hash::make(Input::get('password'))
  ]);

  return Redirect::to('/dashboard');

}]);

Route::get('dashboard', ['before' => 'auth.basic', function() {
  return View::make('dash')->with('user', Auth::user() ? Auth::user()->email : null);
}]);

Route::get('payment', [
  'as' => 'payment',
  'uses' => 'IndexController@postPayment'
]);

Route::get('payment/status', [
  'as' => 'payment.status',
  'uses' => 'IndexController@paymentStatus'
]);

Route::get('download', function () {
  if (Auth::user()->paid_up) {

    if (Config::get('aws.key')) {

      $s3 = \Aws\S3\S3Client::factory([
      'signature' => 'v4',
      'key'    => Config::get('aws.key'),
      'secret' => Config::get('aws.secret'),
      'region' => Config::get('aws.region'),
    ]);

      $uri = $s3->getObjectUrl('matthewmarcus',
        '79a.jpg', '+5 minutes');

    } else {
      throw new Exception('Amazon credentials not found');
    }

    return Redirect::to($uri);
  }

  return Redirect::to('payment');

});
