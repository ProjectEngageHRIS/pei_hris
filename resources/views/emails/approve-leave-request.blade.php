<!DOCTYPE html>
<html>
<head>
    <title>Leave Request Status Update</title>
</head>
<body>
    <h1>Leave Request Update</h1>

    <p>Hello Employee {{ $leaverequestdata->employee_id }},</p>

    <p>Your leave request has been updated. Here are the details:</p>

    <ul>

        <li><strong>Status:</strong> {{ $leaverequestdata->status }}</li>
        <li><strong>Updated by: {{ $person }}</strong></li>
        <li><strong>Leave Type:</strong> {{ $leaverequestdata->mode_of_application }}</li>
        <li><strong>Date Requested: {{ $leaverequestdata->inclusive_start_date }}</strong></li>
        <li><strong>Actual Schedule: {{ $leaverequestdata->inclusive_end_date }}</strong></li>

    </ul>

    <p>If you have any questions, please feel free to contact HR.</p>

    <p>Thank you,</p>
    <p>The HR Team</p>
</body>
</html>
