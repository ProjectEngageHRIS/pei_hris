<!DOCTYPE html>
<html>
<head>
<title>New Leave Request Submitted</title>
</head>

<body>
<p>Hello {{ $employeeRecord->first_name }},</p>

<p>This is to confirm that your leave request has been successfully submitted.</p>

<p>Leave Request Details:</p>
<ul>

<li>Application Date: {{ (new DateTime($leaveRequest->application_date))->setTimezone(new DateTimeZone('Asia/Manila'))->format('Y-m-d \T\i\m\e: g:i:s A') }}</li>
<li>Type of Leave: {{ $leaveRequest->mode_of_application }}</li>

</ul>


<p>We have notified your supervisor regarding this request.</p>

<p>Thank you.</p>

<img src="{{$message->embed(public_path().'/sllogo.png') }}">

</body>
</html>