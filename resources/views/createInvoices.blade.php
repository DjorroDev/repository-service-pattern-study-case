<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Invoice</title>
</head>

<body>
    <form action="/invoices/create" method="POST">
        @csrf
        <div>
            <label for="amount">Amount:</label>
            <input type="number" name="amount" id="amount" required>
        </div>
        <div>
            <label for="note">Note:</label>
            <textarea name="note" id="note" rows="4"></textarea>
        </div>
        <div>
            <label for="user_id">User ID:</label>
            <input type="number" name="user_id" id="user_id" required>
        </div>
        <div>
            <button type="submit">Create Invoice</button>
        </div>
    </form>
</body>

</html>