<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2>Order Details</h2>
                <button class="btn btn-sm btn-primary float-end" onclick="window.print()">Print</button>
                <hr/>
                <table class="table table-bordered">
                    <tr>
                        <td>Invoice No. {{ $order->invoice_id }}</td>
                    </tr>
                    <tr>
                        <td>Name : {{ $order->name }}</td>
                        <td>Phone : {{ $order->phone }}</td>
                    </tr>
                    <tr>
                        <td>Billing Address : {{ $order->billing_address }}</td>
                        <td>Shipping Address : {{ $order->shipping_address }}</td>
                    </tr>
                    <tr>
                        <td>Total Price : {{ $order->total_price }}</td>
                        <td>Total Qty : {{ $order->total_qty }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
