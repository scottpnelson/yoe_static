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
	$captchaBuilder = new \YOE\Captcha\Builder;
	$captcha = $captchaBuilder->makeCaptcha();

	//$debug_captcha_value = $captchaBuilder->getCaptchaValue();

	return View::make('home.index')->with(compact('captcha', 'debug_captcha_value'));
});

Route::post('/', 'EmailController@processEnquiry');

Route::get('/captcha', 'CaptchaController@resetAndGetCaptcha');