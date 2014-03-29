<?php

use YOE\Captcha\Builder;

class CaptchaController extends BaseController {

	protected $builder;

	public function __construct()
	{
		$this->builder = new Builder;
	}

	public function resetAndGetCaptcha()
	{
		// Get a new captcha image and refresh the Session values
		$captcha = $this->builder->makeCaptcha();

		// We need to output just the image, so let's decode the base64 provided by this Laravel Captcha package
		$comma = strpos($captcha, ',');
		$captcha = base64_decode(substr($captcha, $comma+1));

		// Return just the image
		return Response::make($captcha, 200)->header('Content-Type', 'image/jpeg');
	}

}