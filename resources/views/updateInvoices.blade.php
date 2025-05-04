<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Invoice</title>
</head>

<body>
    <h1>edit invoice {{$id}}</h1>
    <form action="{{ route('invoices.update', $id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="amount">Amount:</label>
            <input type="number" name="amount" id="amount" required>
        </div>
        <div>
            <label for="note">Note:</label>
            <textarea name="note" id="note" rows="4"></textarea>
        </div>
        <div>
            <button type="submit">Update Invoice</button>
        </div>
    </form>
</body>

</html>