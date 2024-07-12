<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New IT Ticket Submitted</title>
    <style>
 <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #dddddd;
            border-radius: 5px;
            color: #000000;
        }
        .header {
            text-align: center;
            border-bottom: 1px solid #dddddd;
            padding-bottom: 10px;
            color: #000000;
        }
        .content {
            padding: 20px;
            color: #000000;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #888888;
        }
        ul {
            list-style-type: none;
            border-radius: 5px;
            border: 1px solid #dddddd;
        }
        ul li {
            padding: 10px;
            margin-bottom: 5px;
            color: #000000;
        }
        img {
            display: block;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <img src="{{$message->embed(public_path().'/sllogo.png') }}" alt="Company Logo" style="max-width: 150px;">
        </div>
        <div class="content">
            <p>Hello, {{ $employeeRecord->first_name }}.</p>

            <p>This is to confirm that your IT Ticket has been successfully submitted.</p>

            <p>We have notified the IT personnel regarding this request.</p>

            <p>Thank you.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} SL Groups. All rights reserved.
        </div>
    </div>
</body>
</html>
