<!DOCTYPE html>
<html>

<head>
    <title>Invoice</title>
    <style>
        /* Add your custom CSS styles here */
        /* Example: */
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Invoice</h2>
    <p>Date Created: {{ $invoice->created_at }}</p>
    @if($eventDate)
    <p>Event Date: {{ $eventDate }}</p>
    @endif
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Unit Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php
            $total = 0; // Initialize the total variable
            @endphp
            @foreach ($invoice->items as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->title }}</td>
                <td>
                    @if(in_array($item->title, ['PAKEJ RUBY', 'PAKEJ NILAM', 'PAKEJ DIAMOND']))
                    RM{{ $item->total_amount }}
                    @else
                    RM{{ $item->price }}
                    @endif
                </td>
                <td>{{ $item->total }}</td>
            </tr>
            @php
            if (in_array($item->title, ['PAKEJ RUBY', 'PAKEJ NILAM', 'PAKEJ DIAMOND'])) {
            $total += $item->total_amount; // Add the item's total amount to the total
            } else {
            $total += $item->price; // Add the item's price to the total
            }
            @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" style="text-align: right;">Total:</td>
                <td>RM{{ $total }}</td>
            </tr>
        </tfoot>
    </table>
</body>

</html>