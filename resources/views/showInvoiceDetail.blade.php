<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Details</title>
</head>

<body>
    <h1>Invoice Details</h1>
    <table>
        <tr>
            <th>ID</th>
            <td>{{ $invoice->id }}</td>
        </tr>
        <tr>
            <th>Code</th>
            <td>{{ $invoice->code }}</td>
        </tr>
        <tr>
            <th>Amount</th>
            <td>{{ $invoice->amount }}</td>
        </tr>
        <tr>
            <th>Note</th>
            <td>{{ $invoice->note }}</td>
        </tr>
        <tr>
            <th>User ID</th>
            <td>{{ $invoice->user_id }}</td>
        </tr>
    </table>
    <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST"
        onsubmit="return confirm('Are you sure you want to delete this invoice?');">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</body>

</html>