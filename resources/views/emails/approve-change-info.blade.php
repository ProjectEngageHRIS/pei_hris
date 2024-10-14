<!DOCTYPE html>
<html>
<head>
    <title>Change Informaton Request Status Update</title>
</head>
<body>
    <h1>Change Informaton Request Update</h1>

    <p>Hello  {{ $employee->first_name }}, </p>

    <p>Your Change Informaton Request has been updated. Here are the details:</p>

    <ul>
        <li>Status: <strong>{{ $status }}</strong></li>
        <li><strong>Application Date:</strong> {{ $form->application_date }}</li>
    </ul>

    <p>If you have any questions, please feel free to contact HR.</p>

    <p>Thank you,</p>
    <p>The HR Team</p>
</body>
</html>
