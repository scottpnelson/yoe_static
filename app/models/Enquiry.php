<?php

class Enquiry extends Eloquent {

	protected $table = 'enquiries';

	private $rules = [
		'name'    => 'required',
		'email'   => 'required|email',
		'subject' => 'required',
		'message' => 'required',
		'captcha' => 'required|captcha'
	];

	public function validate($input)
	{
		// Add a custom "captcha" validator
		Validator::extend('captcha', function($field, $value, $params)
		{
			return $value == Session::get('captcha_phrase');
		});

		// Return the validator
		return Validator::make($input, $this->rules);
	}

	public function store()
	{
		$this->from_name  = Input::get('name');
		$this->from_email = Input::get('email');
		$this->subject    = Input::get('subject');
		$this->message    = Input::get('message');

		return $this->save();
	}

}