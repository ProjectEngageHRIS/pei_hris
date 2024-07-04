<!DOCTYPE html>
<html>
<head>
    <title>New Leave Request Submitted</title>
</head>
<body>
    <p>Dear Supervisor,</p>
    <p>{{ $employeeRecord->first_name }} has submitted a new leave request.</p>
    <p>Details:</p>
    <ul>
        <li>Full Name: {{ $employeeRecord->first_name }} {{ $employeeRecord->last_name }}</li>
        <li>Employee ID: {{ $leaveRequest->employee_id }}</li>
        <li>Type of Leave: {{ $leaveRequest->mode_of_application }}</li>
        <li>Start Date: {{ (new DateTime($leaveRequest->inclusive_start_date))->setTimezone(new DateTimeZone('Asia/Manila'))->format('Y-m-d \T\i\m\e: g:i:s A') }}</li>
        <li>End Date: {{ (new DateTime($leaveRequest->inclusive_end_date))->setTimezone(new DateTimeZone('Asia/Manila'))->format('Y-m-d \T\i\m\e: g:i:s A') }}</li>
        <li>Reason: {{ $leaveRequest->reason }}</li>
        <li>Purpose Type: {{ $leaveRequest->purpose_type }}</li>
        <li>Deduct to: {{ $leaveRequest->deduct_to }}</li>
    </ul>

    <p>Please review the leave request below at your earliest convenience.</p>
    
    <a href="{{ route('ApproveLeaveRequestForm', ['index' => $leaveRequest->form_id]) }}" style="display: inline-block; background-color: #AC0C2E; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 5px;">Review Request</a>


    <p>Thank you.</p>
    <img src="{{$message->embed(public_path().'/sllogo.png') }}">
</body>
</html>