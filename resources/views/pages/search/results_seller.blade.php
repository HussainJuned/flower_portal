@extends('layouts.master')
@section('title', 'Seller Search Results')


@section('content')
    <div class="container">
        <h2 class="my-3">Search Results: total {{ count($sellers) }} Seller found</h2>
        <form action="{{ route('search.seller') }}" method="get" class="my-3">
            <div class="form-group mb-30 d-flex justify-content-center align-items-center">
                <label for="search_flower mr-3">Search for Seller: </label>
                <input type="text" class="px-3 mx-3{{ $errors->has('search_seller') ? ' is-invalid' : '' }}"
                       value="{{ $keyword }}"
                       id="search_seller" name="search_seller" placeholder="e.g. anderson">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
            @if ($errors->has('search_seller'))
                <span class="invalid-feedback my-3" role="alert">
                            <strong>{{ $errors->first('search_seller') }}</strong>
                        </span>
            @endif

        </form>
        <div class="row">
            @if(count($sellers) < 1)
                <div class="col-sm-12 mb-3">
                    <div class="card p-5">
                        <p class="mb-3"> Sorry no result found</p>
                    </div>
                </div>
                @else
                    @foreach($sellers as $seller)
                        <div class="col-sm-6 mb-3">
                            @include('partials.seller_box')
                        </div>
                    @endforeach
            @endif
            <div class="my-3">
                {{ $sellers->links() }}
            </div>
        </div>
    </div>
@endsection