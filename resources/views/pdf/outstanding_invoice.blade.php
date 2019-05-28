<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width">
    <title>Outstanding Invoice</title>
    <style media="all">

        body {
            margin: 0;
            padding: 30pt;
            box-sizing: border-box;
        }

        .row::after {
            content: '';
            display: table;
            clear: both;
            overflow: hidden;
        }

        .col-6 {
            width: 50%;
            float: left;
        }

        .margin_medium {

        }

        .margin_medium h1 {
            margin: 0;
            font-size: 22px;
        }

        .row {
            width: 100%;
        }

        .margin_large {
        }

        .col-3 {
            width: 25%;
            float: left;
        }

        .colorful {
            color: #46afe8;
            margin-right: 20px;
        }

        h4 {
            line-height: 30px;
            font-size: 16px;
            margin: 10px 0 20px;
        }

        p {
        }

        .text-right {
            text-align: right;
        }

        .col-12 {
            width: 100%;
            float: left;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table tr {
        }

        table th,
        table td {
            width: 100px;
            text-align: left;
            padding: 10px;
        }

        table th {
            border-bottom: 1px solid black;
        }

        table td {
        }

        footer {
        }

        footer p {
        }

        table th:first-child, table td:first-child {
            width: 40px;
            padding-left: 0;
        }

        .min_height_600 {
            min-height: 800px;
        }

        .mt-50 {
            margin-top: 50px;
        }

        tfoot tr:first-child th {
            padding-top: 20px;
        }

        .margin_large {
            margin-top: 30px;
        }
    </style>
</head>
<body>
<div class="row">
    <div class="col-6 margin_medium">
        <h1>Seller Name: Hussain Juned</h1>
    </div>
    <div class="col-6 margin_medium text-right">
        <h1>Buyer Name: Prof. Janelle Cartwright</h1>
    </div>

    <div class="col-6">
        <h4>Seller Address: <br> 64537 Leilani Forges Suite 298
            Brainshire, MS 41652, 52740-2071,
            <br>
            Ornbury, Jersey
        </h4>
        <h4>Seller Contact: 619-875-3616 x693</h4>
    </div>
    <div class="col-6  text-right">
        <h4>Buyer Address: <br>
            Renesa 5, Block B, Jahanpur, Islampur, Shahporan, 3100, <br>
            Sylhet, Bangladesh
        </h4>
        <h4>Buyer Contact: (808) 413-6619 x47154</h4>
    </div>
    <div class="col-12 margin_large">
        <div class="row">
            <div class="col-3">
                <p><span class="colorful">Invoice NO:</span> {{ $invoice->id }}</p>
            </div>
            <div class="col-3">
                <p><span class="colorful">Invoice Date:</span> {{ date('d-m-Y', strtotime($invoice->created_at)) }}</p>
            </div>

            <div class="col-6 text-right">
                <p><span
                        class="colorful">Order Delivery Date:</span> {{ date('d-m-Y', strtotime($invoice->order->order_date)) }}
                </p>
            </div>

        </div>
    </div>
</div>
<div class="row min_height_600 mt-50">
    <div class="col-12">
        <table>
            <thead>

            <tr>
                <th>No.</th>
                <th>Product name</th>
                <th>Quantity</th>
                <th>Length</th>
                <th>Currency</th>
                <th>Price</th>
                <th>Amount</th>
            </tr>


            </thead>
            <tbody>
            @foreach ($invoice->order->orderProducts as $index => $o_product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $o_product->product->name }}</td>
                    <td>1 x {{ $o_product->quantity }}</td>
                    <td>{{ $o_product->product->height }}</td>
                    <td>{{ $invoice->currency }}</td>
                    <td>{{ $o_product->unit_price }}</td>
                    <td>{{ $o_product->total_price }}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="6"></td>
                <th colspan="1"></th>
            </tr>
            <tr>
                <td colspan="5"></td>
                <td class="text-right">Total:</td>
                <td>{{ $invoice->amount }}</td>
            </tr>

            </tfoot>
        </table>
    </div>
</div>

<footer>
    <p>&copy; Floweret</p>
</footer>
</body>
</html>
