<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Provider Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f4f4f4;
            color: #333;
        }
        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tbody tr:hover {
            background-color: #f1f1f1;
        }
        caption {
            font-size: 1.5em;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Provider Report</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Card Count</th>
                <th>Start Date</th>
                <th>Card Selled</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->name}}</td>
                    <td>{{ $item->cards->count() ?? '-' }}</td>
                    <td>{{ $item->created_at->format('Y-m-d ') }}</td>
                    <td>
                        @php
                          $totalSalesAmount = $item->cards->sum(fn($card) => $card->sales->sum('amount'));
                        @endphp
                        {{ $totalSalesAmount }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
