<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Your Own Equipment :: @yield('title')</title>
	<meta name="generator" content="Bootply" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css" rel="stylesheet">

	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" type="text/css" rel="stylesheet">

	@include('assets.styles')
</head>

<body>

<div class="wrap">
<div class="container-full">

	<div class="row">

		<div class="col-lg-12 text-center v-center">

			<div class="header-image">
				<img src="/img/logo.png">
			</div>

			<br><br><br>

			<p class="h2">Website coming soon!</p>

			<br><br><br>

		</div>

	</div> <!-- /row -->



	<div class="jumbotron jumbotron-sm">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-lg-12">
					<h1 class="h1">
						Contact us <small>Feel free to send us a message in the meantime :)</small></h1>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8">

				@if($errors->has())
					<div class="errors-container">
						@foreach ($errors->all() as $error)
							<div class="error alert alert-danger">{{ $error }}</div>
						@endforeach
					</div>
				@endif


				<div class="well well-sm">
					{{ Form::open(['url' => '/']) }}
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								{{ Form::label('name', 'Your Name') }}
								{{ Form::text('name', Input::old('name'), ['class' => 'form-control', 'placeholder' => 'Enter your full name', 'required' => 'required']) }}
							</div>
							<div class="form-group">
								{{ Form::label('email', 'Email Address') }}
								<div class="input-group">
	                                <span class="input-group-addon">
		                                <span class="glyphicon glyphicon-envelope"></span>
	                                </span>
									{{ Form::text('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => 'Enter your email address', 'required' => 'required']) }}
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('subject') }}
								{{ Form::select('subject', [
									'general'     => 'General Enquiry',
									'membership'  => 'Membership Enquiry',
									'accounts'    => 'Account Enquiry',
									'feedback'    => 'Feedback',
									'support'     => 'Product Support',
								], Input::old('subject'), ['class' => 'form-control']) }}
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								{{ Form::label('message') }}
								{{ Form::textarea('message', Input::old('message'), ['class' => 'form-control', 'placeholder' => 'Type your message here', 'required' => 'required']) }}
							</div>

							<div class="captcha">
								<div class="captcha-container">
									<div class="captcha-loading-container">
										<img src="/img/spinner.gif" id="captcha-spinner" />
										<img src="{{ $captcha }}" id="captcha-img" />
									</div>
									<div class="captcha-refresh" id="refresh-captcha">
										<i class="glyphicon icon-refresh captcha-refresh-txt"></i>
									</div>
								</div>
								<div class="form-group">
									{{ Form::label('captcha', 'Type the characters shown above', ['style' => 'margin-top:10px']) }}
									{{ Form::text('captcha', null, ['class' => 'form-control', 'placeholder' => "Type the characters to prove you're a human", 'required' => 'required']) }}
								</div>

							</div>

						</div>
						<div class="col-md-12">
							{{ Form::submit('Send Message', ['class' => 'btn btn-primary pull-right'], 'test') }}
						</div>
					</div>
					{{ Form::close() }}
				</div>
			</div>
			<div class="col-md-4">
				<form>
					<legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
					<address>
						<strong>Your Own Equipment</strong><br>
						PO Box 2049<br>
						Bennettswood, VIC 3125<br>
						<abbr title="Phone">
							P:</abbr>
						1800 349 698
					</address>
					<address>
						<strong>Enquiries</strong><br>
						<a href="mailto:enquiries@yoe247.com.au">enquiries@yoe247.com.au</a>
					</address>
				</form>
			</div>
		</div>
	</div>

	<div id="footer">
		@include('partials.footer')
	</div>

</div>
</div>








	@include('assets.scripts')

</body>
</html>