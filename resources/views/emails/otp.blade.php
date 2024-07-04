<!-- resources/views/emails/otp.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Your OTP Code</title>
</head>
<body>
    <p>Your OTP code is: <strong>{{ $otp }}</strong></p>
    <p>Please use this code to verify your password change request.</p>
</body>
</html>
