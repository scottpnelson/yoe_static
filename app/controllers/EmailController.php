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

		// Create the data array and escape the input
		$data = [
			'from_name'   => e(Input::get('name')),
			'from_email'  => e(Input::get('email')),
			'subject'     => e($this->transformSubject()),
			'body'        => nl2br(e(Input::get('message'))),
		];

		// Store input in DB
		if( ! $id = $this->enquiry->store($data)) {
			return Redirect::to('/#contact-us')
				->withErrors(['message' => 'An error occurred while sending your message. Please try again later.'])
				->withInput(Input::except('captcha'));
		}

		// Push the created_at value onto the array
		$data['created_at'] = $this->enquiry->getCreatedAt($id);

		// Email the enquiries team
		$this->send('email.enquiry', $data);

		// todo: Email the sender with a confirmation

		// todo: validate that the emails were actually sent

		// todo: email admin on fatal error

		// todo: implement logging


		// Redirect with success message
		return Redirect::to('/#contact-us')
			->with('success', 'Thank you! Your enquiry has been sent to our team.');
	}

	private function send($view_name, array $data)
	{

		return Mail::queue($view_name, $data, function($message) use ($data) {
			$from_name   = $data['from_name'];
			$from_email  = $data['from_email'];
			$subject     = $data['subject'];
//			$created_at  = $data['created_at'];
//			$body     = $data['message'];

			$to_email = $_ENV['MAIL.TO_EMAIL'];
			$to_name  = 'YOE Enquiries';

			$message->from($from_email, $from_name)
				->replyTo($from_email, $from_name)
				->to($to_email, $to_name)
				->subject($subject);
		});
	}

	private function transformSubject()
	{
		// 'YOE enquiry from John Smith RE: General Enquiry
		return 'YOE enquiry from ' . Input::get('name') . ' RE: ' . Input::get('subject');
	}


}