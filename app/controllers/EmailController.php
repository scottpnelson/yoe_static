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
			return Redirect::to('/#contact-us')
				->withErrors($validator)
				->withInput(Input::except('captcha'));
		}

		// Store input in DB
		if( ! $this->enquiry->store()) {
			return Redirect::to('/#contact-us')
				->withErrors(['message' => 'An error occurred while sending your message. Please try again later.'])
				->withInput(Input::except('captcha'));
		}

		// Email the enquiries team


		// Email the sender with a confirmation


		// Redirect with success message
		return Redirect::to('/#contact-us')
			->with('success', 'Thank you! Your enquiry has been sent to our team.');
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

}