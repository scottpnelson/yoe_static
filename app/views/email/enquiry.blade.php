<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>YOE Enquiry</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td style="padding: 0 0 30px 0;">
			<!-- Table1 -->
			<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
				<tr>
					<td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
						<img src="http://yoe247.com.au/img/logo.png" alt="YOE 24/7" width="254" height="94" style="display: block;" />
					</td>
				</tr>
				<tr>
					<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
									<b>{{ $subject }}</b>
								</td>
							</tr>
							<tr>
								<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
									A new message has been submitted via www.yoe247.com.au <br/><br/>

									<b>From:</b> {{$from_name}} <br/><br/>

									<b>Email:</b> {{$from_email}} <br/><br/>

									<b>Subject:</b> {{$subject}} <br/><br/>

									<b>Sent at:</b> {{$created_at}} <br/><br/>

									<b>Message:</b> <br/>
									{{ nl2br($body) }}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<!-- Table1 -->
		</td>
	</tr>
</table>
</body>
</html>
