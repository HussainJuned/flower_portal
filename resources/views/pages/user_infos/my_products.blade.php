@extends('layouts.master')
@section('title', 'Floral Portal')


@section('content')
    <div class="container">
        <div class="row">
            @if(session()->has('message'))
                <div class="my-5 container">
                    <a href="{{ route('products.create') }}" class="btn btn-primary">Upload another product</a>
                </div>
            @endif
            
            @include('partials.errors_message')

            @if(count($products) < 1)
                <div class="col-sm-12 mb-3">
                    <div class="card p-5">
                        <p class="mb-3"> You dont have any product to show</p>
                        <p>
                            <a href="{{ route('products.create') }}" class="btn btn-primary">Upload product</a>
                        </p>
                    </div>
                </div>
            @endif

            <div class="col-sm-6 my-3">
                <a href="" class="btn btn-warning">Export product to excel</a>
            </div>
            <div class="col-sm-6 my-3">
                <form action="{{ route('product.import.excel') }}" enctype="multipart/form-data" method="post">
                    @csrf

                    <label for="choose_excel">
                        Import Prdouct from excel
                        <input type="file" id="choose_excel" name="excel_file" class="form-control">
                    </label>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>

            @foreach($products as $product)
                <div class="col-sm-12 mb-3">
                    @include('partials.product_box')
                </div>
            @endforeach
        </div>
    </div>
@endsection
