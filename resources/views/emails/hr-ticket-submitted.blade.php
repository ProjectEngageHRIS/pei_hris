<!DOCTYPE html>
<html>
<head>
    <title>New Leave Request Submitted</title>
</head>
<body>
    <p>Dear Supervisor,</p>
    <p>{{ $employee->first_name }} {{ $employee->last_name }} has submitted a new leave request.</p>
    <p>Details:</p>
    <ul>
        <li>Type of Leave: {{ $leaveRequest->mode_of_application }}</li>
        <li>Start Date: {{ $leaveRequest->inclusive_start_date }}</li>
        <li>End Date: {{ $leaveRequest->inclusive_end_date }}</li>
        <li>Reason: {{ $leaveRequest->reason }}</li>
    </ul>
    <p>Please review the request at your earliest convenience.</p>
    <p>Thank you.</p>
</body>
</html>
