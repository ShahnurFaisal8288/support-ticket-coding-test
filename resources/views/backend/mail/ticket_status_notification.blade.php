<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Status Updated</title>
</head>
<body>
    <h1>Ticket Status Updated</h1>
    <p>Hello,</p>
    <p>Your ticket with the subject <strong>{{ $status->subject }}</strong> has been updated to the status: <strong>{{ $status->status }}</strong>.</p>
    <p>Thank you for your patience.</p>
</body>
</html>