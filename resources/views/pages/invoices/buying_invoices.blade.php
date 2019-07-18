@extends('layouts.master')
@section('title', 'Floral Portal')


@section('content')


    <div class="my-5 container">
        <h1>Invoice</h1>

        <div class="oi_box">

            <div class="table-responsive">
                <table class="oi_t table">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Invoice Number</th>
                        <th>Buyer ID</th>
                        <th>Delivery Date</th>
                        <th>Currency</th>
                        <th>Amount</th>
                        <th>Paid</th>
                        <th>Outstanding</th>
                        <th>Age of Invoice</th>
                        <th>View</th>
                        <th>PDF</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($invoices as $invoice)
                        <tr>
                            <td>{{ date('d/m/Y', strtotime($invoice->created_at)) }}</td>
                            <td>{{ $invoice->id }}</td>
                            <td>{{ $invoice->user_id }}</td>
                            <td>{{ $invoice->due_date }}</td>
                            <td>{{ $invoice->currency }}</td>
                            <td>{{ $invoice->amount }}</td>
                            <td>{{ $invoice->paid }}</td>
                            <td>{{ $invoice->outstanding }}</td>
                            <td>{{ \Carbon\Carbon::parse($invoice->created_at)->diffInDays(\Carbon\Carbon::today()) + 1 }}</td>
                            <td><a href="{{ route('view.html.oipdf', ['invoice' => $invoice->id]) }}"
                                   class="btn btn-link">View</a></td>
                            <td><a href="{{ route('pdf.invoice.outstanding', ['invoice' => $invoice->id]) }}"
                                   class="btn btn-link">Download</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>

    </div>


@endsection
