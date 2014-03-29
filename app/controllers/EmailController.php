<?php

class EmailController extends BaseController {

	protected $enquiry;

	public function __construct(Enquiry $enquiry)
	{
		$this->enquiry = $enquiry;
	}

	public function processEnquiry()
	{
		// Validate input
		$input = Input::all();

		$validator = $this->enquiry->validate($input);

		if( $validator->fails()) {
			return Redirect::to('/')->withErrors($validator)->withInput(Input::except('captcha'));
		}

		dd('Validation passed!');

		// todo: send the email

		$data = $input;
		$view = '';

		// Send email

		// Redirect with flash message

	}

	private function send($data, $view_name)
	{
		return Mail::send($view_name, $data, function($message) use ($data)
		{
			$to_email = $data['to_email'];
			$to_name  = $data['to_name'];
			$subject  = $data['subject'];

			$message->to($to_email, $to_name)->subject($subject);
		});
	}

	private function store()
	{

	}

}