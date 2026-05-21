<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>New message</title>
</head>
<body>
    <h1>New message of {{ $details['name'] }}</h1>
    <p>Email: {{ $details['email'] }} </p>
    <p>Message: </p>
    <p> {{ $details['message'] }} </p>
</body>
</html>