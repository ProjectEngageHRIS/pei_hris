<!DOCTYPE html>
<html>
<head>
    <title>HR Ticket Request Status Update</title>
</head>
<body>
    <h1>HR Ticket Request Update</h1>

    <p>Hello  {{ $employee->first_name }}, </p>

    <p>Your Hr Ticket has been updated. Here are the details:</p>

    <ul>

        <li>Status: <strong>{{ $status }}</strong></li>
        <li><strong>Ticket Type:</strong> {{ $form->type_of_ticket }}</li>
        <li><strong>Request Type:</strong> {{ $form->type_of_request }}</li>
        <li><strong>Sub Request Type:</strong> {{ $form->sub_type_of_request }}</li>
        <li><strong> Purpose:</strong> {{ $form->purpose }}</li>
        <li><strong>Application Date:</strong> {{ $form->application_date }}</li>


    </ul>

    <p>If you have any questions, please feel free to contact HR.</p>

    <p>Thank you,</p>
    <p>The HR Team</p>
</body>
</html>
