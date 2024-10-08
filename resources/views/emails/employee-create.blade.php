<!DOCTYPE html>
<html>
<head>
    <title>New Employee Created!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #AC0C2E;
        }
        p {
            font-size: 16px;
            color: #333333;
            line-height: 1.5;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        ul li {
            font-size: 16px;
            color: #333333;
            padding: 5px 0;
        }
        a.button {
            display: inline-block;
            background-color: #AC0C2E;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 20px;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
        }
        .footer img {
            width: 100px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h1>New Employee Created!</h1>
        <p>Dear {{ $new_user->first_name }},</p>
        <p>Please check the details below for your login credentials:</p>
        <p><strong>Details:</strong></p>
        <ul>
            <li><strong>Employee ID:</strong> {{ $new_user->employee_id }}</li>
            <li><strong>Password:</strong> {{ $password }}</li>
        </ul>
        <p>For security reasons, please change your password immediately. You can log in using the button below at your earliest convenience:</p>
        <a href="{{ route('LoginDashboard') }}" class="button">Sign In</a>

            <!-- <img src="{{$message->embed(public_path().'/sllogo.png') }}"> -->
    </div>
</body>
</html>
