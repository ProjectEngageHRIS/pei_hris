<!DOCTYPE html>
<html>
<head>
    <title>IT Ticket Request Status Update</title>
</head>
<body>
    <h1>IT Ticket Request Update</h1>

    <p>Hello  {{ $employee->first_name }}, </p>

    <p>Your leave request has been updated. Here are the details:</p>

    <ul>

        <li>Status: <strong>{{ $status }}</strong></li>
        <li><strong>Date Filled:</strong> {{ $form->application_date }}</li>
        <li><strong>Description:</strong> {{ $form->description }}</li>
        <li><strong>Report:</strong> {{ $form->report }}</li>


    </ul>

    <p>If you have any questions, please feel free to contact the IT personnel.</p>

    <p>Thank you,</p>
    <p>The IT Team</p>
</body>
</html>
