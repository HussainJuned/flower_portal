@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        You are logged in as {{ Auth::user()->name }}!
                            <a href="{{ route('userinfos.edit', ['userinfo' => auth()->user()->userinfo->id]) }}"
                            class="btn btn-link">Manage My Account</a>
                        <div class="my-5">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-selling-tab" data-toggle="tab"
                                       href="#nav-selling" role="tab" aria-controls="nav-selling" aria-selected="true">
                                        Seller Dashboard
                                    </a>
                                    <a class="nav-item nav-link" id="nav-buying-tab" data-toggle="tab"
                                       href="#nav-buying" role="tab" aria-controls="nav-buying" aria-selected="false">
                                        Buyer Dashboard
                                    </a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane active" id="nav-selling" role="tabpanel"
                                     aria-labelledby="nav-selling-tab">
                                    <div class="mx-5 my-5">
                                        <p class="my-3">View
                                            <a href="{{ route('seller_dashboard.seller_dashboard') }}">Seller Dashboard</a></p>
                                        <a href="{{ route('products.create') }}" class="btn j_btn my-3">Upload Product</a>
                                        <a href="{{ route('seller_dashboard.myProducts') }}" class="ml-3 btn j_btn my-3">View My Products</a>
                                    </div>
                                </div>
                                <div class="tab-pane" id="nav-buying" role="tabpanel"
                                     aria-labelledby="nav-buying-tab">
                                    <div class="mx-5 my-5">
                                        <p class="my-5">Click to view
                                            <a href="{{ route('buyer_dashboard.buyer_dashboard') }}">Buyer Dashboard</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
