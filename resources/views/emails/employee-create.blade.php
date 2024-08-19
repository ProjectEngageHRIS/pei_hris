<!DOCTYPE html>
<html>
<head>
    <title>New Employee Created!</title>
</head>
<body>
    <p>Dear {{ $add_employee->first_name }},</p>
    <p>Please check the details below for your login credentials</p>
    <p>Details:</p>
    <ul>
        <li>Employee ID: {{ $add_employee->employee_id }}</li>
        <li>Password: {{ $new_user->password }}</li>

    </ul>

    <p>Please change your password immediately, try to login below at your earliest convinience.</p>



    <p>Thank you.</p>
    <img src="{{$message->embed(public_path().'/sllogo.png') }}">
</body>
</html>
