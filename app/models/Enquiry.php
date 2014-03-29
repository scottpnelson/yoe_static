<?php

use Carbon\Carbon;

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
		try {
			$this->from_name  = Input::get('name');
			$this->from_email = Input::get('email');
			$this->subject    = Input::get('subject');
			$this->message    = Input::get('message');

			$this->save();

			return $this->id;
		}
		catch(Illuminate\Database\QueryException $e)
		{
			return false;
		}

	}

	public function getCreatedAt($id)
	{
		// Get the Carbon object from the table
		$created_at = $this->where('id', $id)->firstOrFail(['created_at'])->created_at;

		// Return the date in the form of "Thu, Dec 25, 1975 2:15 PM"
		return $created_at->toDayDateTimeString();
	}

}