<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Ticket Notification</title>
</head>
<body>
    <h1>New Ticket Created</h1>
    <p>A new ticket has been created by {{ $auth->name }}.</p>
    <h2>Ticket Details:</h2>
    <ul>
        <li><strong>Subject:</strong> {{ $ticket->subject }}</li>
        <li><strong>Issues:</strong> {{ $ticket->issues }}</li>
        <li><strong>Created At:</strong> {{ $ticket->created_at->format('Y-m-d H:i:s') }}</li>
    </ul>
    <p>Please review and take necessary action.</p>
</body>
</html>