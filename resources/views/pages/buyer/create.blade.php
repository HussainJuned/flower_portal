@extends('layouts.master')
@section('title', 'Register as Buyer')


@section('content')
    <div class="container">
        <main>
            <form action="{{ route('buyers.store') }}" method="post" class="w-50 mx-auto mb-5">
                @csrf
                <h2 class="mt-3 mb-30">Register as Buyer</h2>
                <div class="form-group mb-30">
                    <label for="company_name">Company Name</label>
                    <input required type="text" class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" value="{{ old('company_name') }}"
                           id="company_name" name="company_name" placeholder="e.g. Walmart">
                    @if ($errors->has('company_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('company_name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group mb-30">
                    <label for="title">Title</label>
                    <select class="form-control" id="title" name="title" required>
                        @if(old('title', null) != null)
                            <option selected value="{{ old('title') }}">{{ old('title') }}</option>
                        @endif
                        <option>Mr.</option>
                        <option>Ms.</option>
                        <option>Mrs.</option>
                    </select>
                </div>
                <div class="form-group mb-30">
                    <label for="first_name">First Name</label>
                    <input required type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" value="{{ old('first_name') }}"
                           id="first_name" name="first_name" placeholder="e.g. John">
                    @if ($errors->has('first_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group mb-30">
                    <label for="last_name">Last Name</label>
                    <input required type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" value="{{ old('last_name') }}"
                           id="last_name" name="last_name" placeholder="e.g. Doe">
                    @if ($errors->has('last_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group mb-30">
                    <label for="country1">Country</label>
                    <input list="country" name="country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" value="{{ old('country') }}" required>
                    <datalist id="country">
                        @include('partials.all_country_options')
                    </datalist>
                    @if ($errors->has('country'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('country') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group mb-30">
                    <label for="state">State</label>
                    <input required type="text" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" value="{{ old('state') }}"
                           id="state" name="state" placeholder="e.g. New York">
                    @if ($errors->has('state'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('state') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group mb-30">
                    <label for="city">City</label>
                    <input required type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" value="{{ old('city') }}"
                           id="city" name="city" placeholder="e.g. Dunkirk">
                    @if ($errors->has('city'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group mb-30">
                    <label for="delivery_address_1">Delivery Address</label>
                    <input required type="text" class="form-control{{ $errors->has('delivery_address_1') ? ' is-invalid' : '' }}" value="{{ old('delivery_address_1') }}"
                           id="delivery_address_1" name="delivery_address_1"
                           placeholder="Enter Your Address Here">
                    @if ($errors->has('delivery_address_1'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('delivery_address_1') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group mb-30">
                    <label for="delivery_address_2">Delivery Address Line 2 (Optional)</label>
                    <input type="text" class="form-control{{ $errors->has('delivery_address_2') ? ' is-invalid' : '' }}" value="{{ old('delivery_address_2') }}"
                           id="delivery_address_2" name="delivery_address_2"
                           placeholder="Continue Entering Your Address Here If No Space In Above Field">
                    @if ($errors->has('delivery_address_2'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('delivery_address_2') }}</strong>
                        </span>
                    @endif

                </div>
                <div class="form-group mb-30">
                    <label for="zip">Zip</label>
                    <input required type="text" class="form-control{{ $errors->has('zip') ? ' is-invalid' : '' }}" value="{{ old('zip') }}"
                           id="zip" name="zip" placeholder="e.g. 14048">
                    @if ($errors->has('zip'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('zip') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group mb-30">
                    <label for="telephone">Telephone</label>
                    <input required type="text" class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }}" value="{{ old('telephone') }}"
                           id="telephone" name="telephone" placeholder="e.g. 212-509-6995">
                    @if ($errors->has('telephone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('telephone') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group mb-30">
                    <label for="business_type">Business Type</label>
                    <select class="form-control" id="business_type" name="business_type" required>
                        @if(old('business_type', null) != null)
                            <option selected value="{{ old('business_type') }}">{{ old('business_type') }}</option>
                        @endif
                        <option value="Sole">Sole</option>
                        <option value="Partnership">Partnership</option>
                        <option value="General">General</option>
                        <option value="Corporation">Corporation</option>
                        <option value="Company">Company</option>
                    </select>
                </div>
                <div class="form-group mb-30">
                    <label for="hear_about_us">How Did You Hear About Us?</label>
                    <select class="form-control" id="hear_about_us" name="hear_about_us" required>
                        @if(old('hear_about_us', null) != null)
                            <option selected value="{{ old('hear_about_us') }}">{{ old('hear_about_us') }}</option>
                        @endif
                        <option>From Friends</option>
                        <option>From Online Ad</option>
                        <option>From Search Engine</option>
                    </select>
                </div>
                <div class="form-group mb-30 form-check">
                    <input required type="checkbox" class="form-check-input{{ $errors->has('terms_and_conditions') ? ' is-invalid' : '' }}" id="exampleCheck1" name="terms_and_conditions"
                           value="agree">
                    <label class="form-check-label" for="exampleCheck1">I agree to the terms and conditions</label>
                    @if ($errors->has('terms_and_conditions'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('terms_and_conditions') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn j_btn">Submit</button>
            </form>
        </main>
    </div>
@endsection