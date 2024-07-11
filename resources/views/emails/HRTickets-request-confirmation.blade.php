<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New HR Ticket Submitted</title>
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
        }
        .header {
            text-align: center;
            border-bottom: 1px solid #dddddd;
            padding-bottom: 10px;
        }
        .content {
            padding: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #888888;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            background-color: #f9f9f9;
            padding: 10px;
            margin-bottom: 5px;
            border: 1px solid #dddddd;
            border-radius: 5px;
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
            <p>Hello {{ $employeeRecord->first_name }},</p>

            <p>This is to confirm that your HR Ticket has been successfully submitted.</p>

            <p><strong>Submitted on:</strong></p>
            <ul>
                <li>Application Date: {{ (new DateTime($hrticketdata->application_date))->setTimezone(new DateTimeZone('Asia/Manila'))->format('Y-m-d \T\i\m\e: g:i:s A') }}</li>
            </ul>

            <p>We have notified your supervisor regarding this request.</p>

            <p>Thank you.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} SL Groups. All rights reserved.
        </div>
    </div>
</body>
</html>
