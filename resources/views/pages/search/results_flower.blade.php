@extends('layouts.master')
@section('title', 'Flower Search Results')


@section('content')
    <div class="container">
        <h2 class="my-3">Search Results: total
            @if ($products != null)
                {{ count($products) }}
            @else
                0
            @endif


             product found</h2>
        <form action="{{ route('search.flower') }}" method="get" class="my-3">
            <div class="form-group mb-30 d-flex justify-content-center align-items-center">
                <label for="search_flower mr-3">Search for Flowers: </label>
                <input type="text" class="px-3 mx-3{{ $errors->has('search_flower') ? ' is-invalid' : '' }}"
                       value="{{ $keyword }}"
                       id="search_flower" name="search_flower" placeholder="e.g. Rose">
                <div class="form-group mb-30 mr-3">
                    <label for="available_date">Available Date</label>
                    <input type="date"
                           class="form-control{{ $errors->has('available_date') ? ' is-invalid' : '' }}"
                           value="{{ $a_date }}"
                           id="available_date" name="available_date" placeholder="e.g. red">
                    @if ($errors->has('available_date'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('available_date') }}</strong>
                        </span>
                    @endif
                </div>

                <button type="submit" class="btn my_account_btn dashboard-btn">Search</button>
            </div>
            @if ($errors->has('search_flower'))
                <span class="invalid-feedback my-3" role="alert">
                            <strong>{{ $errors->first('search_flower') }}</strong>
                        </span>
            @endif

        </form>
        <div class="row">
            @if(count($products) < 1)
                <div class="col-sm-12 mb-3">
                    <div class="card p-5">
                        <p class="mb-3"> Sorry no result found</p>
                    </div>
                </div>
                @else
                    @foreach($products as $product)
                        <div class="col-sm-6 mb-3">
                            @include('partials.product_box')
                        </div>
                    @endforeach
            @endif
            <div class="my-3">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection