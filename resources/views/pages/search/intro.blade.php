@extends('layouts.master')
@section('title', 'Search')

@section('content')
    <div class="container">
        <h2 class="my-3">Search</h2>
        <div class="row">
            <div class="col-sm-6">
                <form action="{{ route('search.flower') }}" method="get" class="my-3">
                    <div class="form-group mb-30">
                        <label for="search_flower">Search for Flowers </label>
                        <input type="text" class="form-control{{ $errors->has('search_flower') ? ' is-invalid' : '' }}"
                               value="{{ old('search_flower') }}"
                               id="search_flower" name="search_flower" placeholder="e.g. Rose">
                        @if ($errors->has('search_flower'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('search_flower') }}</strong>
                        </span>
                        @endif
                    </div>

                    {{--<div class="form-group mb-30">
                        <label for="available_date">Available Date</label>
                        <input type="date"
                               class="form-control{{ $errors->has('available_date') ? ' is-invalid' : '' }}"
                               value="{{ old('available_date') }}"
                               id="available_date" name="available_date" placeholder="e.g. red">
                        @if ($errors->has('available_date'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('available_date') }}</strong>
                        </span>
                        @endif
                    </div>--}}

                    <button type="submit" class="btn my_account_btn">Search</button>
                </form>
                <form action="{{ route('search.seller') }}" method="get" class="my-5">
                    <div class="form-group mb-30">
                        <label for="search_seller">Search for Seller </label>
                        <input type="text" class="form-control{{ $errors->has('search_seller') ? ' is-invalid' : '' }}"
                               value="{{ old('search_seller') }}"
                               id="search_seller" name="search_seller" placeholder="e.g. anderson">
                        @if ($errors->has('search_seller'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('search_seller') }}</strong>
                        </span>
                        @endif
                    </div>
                    <button type="submit" class="btn my_account_btn">Search</button>
                </form>
            </div>
        </div>

    </div>
@endsection
