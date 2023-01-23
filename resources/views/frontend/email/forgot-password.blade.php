<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
</head>
<body>
    Dear {{ $user->name}}
    Please click below link and set your new password.<br/>
    <a href="{{ url('/set-new-password/'.$user->id) }}">Reset Password</a> <br/>

    Thank you <br/>
    Ecomerce Team
</body>
</html>
