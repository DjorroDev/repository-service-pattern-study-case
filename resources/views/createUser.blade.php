<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User and Invoice</title>
</head>

<body>
    <h1>Create User and Invoice</h1>
    <form action="/users/create" method="POST">
        @csrf
        <h2>User Information</h2>
        <label for="name">Name:</label>
        <input type="text" id="name" name="user[name]" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="user[email]" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="user[password]" required>
        <br><br>

        <h2>Invoice Information</h2>
        <label for="note">Note:</label>
        <textarea id="note" name="invoice[note]" required></textarea>
        <br>
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="invoice[amount]" step="0.01" required>
        <br><br>

        <button type="submit">Submit</button>
    </form>
</body>

</html>