<?php namespace YOE\Captcha;

use Gregwar\Captcha\CaptchaBuilder;

class Builder {

	protected $builder;

	public function __construct()
	{
		$this->builder = new CaptchaBuilder;
	}

	public function makeCaptcha()
	{
		$this->builder->build();

		\Session::put('captcha_phrase', $this->builder->getPhrase());

		return $this->builder->inline();
	}

	public function getCaptchaValue()
	{
		return $this->builder->getPhrase();
	}
}