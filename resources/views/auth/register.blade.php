@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <h6 class="text-center my-3">Login Information</h6>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Username</label>
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>
                            </div>
                            <hr>
                            <h6 class="text-center py-3">Personal Information</h6>
                            <div class="form-group mb-30 row">
                                <label for="company_name" class="col-md-4 col-form-label text-md-right">Company
                                    Name
                                </label>
                                <div class="col-md-6">
                                    <input required type="text"
                                           class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}"
                                           value="{{ old('company_name') }}"
                                           id="company_name" name="company_name"
                                           placeholder="e.g. Walmart">
                                    @if ($errors->has('company_name'))
                                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('company_name') }}</strong>
                        </span>
                                    @endif</div>
                            </div>
                            <div class="form-group mb-30 row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="title" name="title" required>
                                        @if(old('title', null) != null)
                                            <option selected value="{{ old('title') }}">{{ old('title') }}</option>
                                        @endif
                                        <option>Mr.</option>
                                        <option>Ms.</option>
                                        <option>Mrs.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-30 row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>
                                <div class="col-md-6">
                                    <input required type="text"
                                           class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                           value="{{ old('first_name') }}"
                                           id="first_name" name="first_name" placeholder="e.g. John">
                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group mb-30 row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>
                                <div class="col-md-6">
                                    <input required type="text"
                                           class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                           value="{{ old('last_name') }}"
                                           id="last_name" name="last_name" placeholder="e.g. Doe">
                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group mb-30 row">
                                <label for="country1" class="col-md-4 col-form-label text-md-right">Country</label>
                                <div class="col-md-6">
                                    <input list="country" name="country"
                                           class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}"
                                           value="{{ old('country') }}" required>
                                    <datalist id="country">
                                        @include('partials.all_country_options')
                                    </datalist>
                                    @if ($errors->has('country'))
                                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('country') }}</strong>
                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group mb-30 row">
                                <label for="state" class="col-md-4 col-form-label text-md-right">State</label>
                                <div class="col-md-6">
                                    <input required type="text"
                                           class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}"
                                           value="{{ old('state') }}"
                                           id="state" name="state" placeholder="e.g. New York">
                                    @if ($errors->has('state'))
                                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('state') }}</strong>
                        </span>
                                    @endif </div>
                            </div>
                            <div class="form-group mb-30 row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">City</label>
                                <div class="col-md-6">
                                    <input required type="text"
                                           class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                                           value="{{ old('city') }}"
                                           id="city" name="city" placeholder="e.g. Dunkirk">
                                    @if ($errors->has('city'))
                                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                                    @endif </div>
                            </div>


                            <div class="form-group mb-30 row">
                                <label for="delivery_address_1" class="col-md-4 col-form-label text-md-right">Delivery
                                    Address
                                </label>
                                <div class="col-md-6">
                                    <input required type="text"
                                           class="form-control{{ $errors->has('delivery_address_1') ? ' is-invalid' : '' }}"
                                           value="{{ old('delivery_address_1') }}"
                                           id="delivery_address_1" name="delivery_address_1"
                                           placeholder="Enter Your Address Here">
                                    @if ($errors->has('delivery_address_1'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('delivery_address_1') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group mb-30 row">
                                <label for="delivery_address_2" class="col-md-4 col-form-label text-md-right">Delivery
                                    Address Line 2 (Optional)
                                </label>
                                <div class="col-md-6">
                                    <input type="text"
                                           class="form-control{{ $errors->has('delivery_address_2') ? ' is-invalid' : '' }}"
                                           value="{{ old('delivery_address_2') }}"
                                           id="delivery_address_2" name="delivery_address_2"
                                           placeholder="Continue Entering Your Address Here If No Space In Above Field">
                                    @if ($errors->has('delivery_address_2'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('delivery_address_2') }}</strong>
                                        </span>
                                    @endif </div>
                            </div>

                            <div class="form-group mb-30 row">
                                <label for="zip" class="col-md-4 col-form-label text-md-right">Zip</label>
                                <div class="col-md-6">
                                    <input required type="text"
                                           class="form-control{{ $errors->has('zip') ? ' is-invalid' : '' }}"
                                           value="{{ old('zip') }}"
                                           id="zip" name="zip" placeholder="e.g. 14048">
                                    @if ($errors->has('zip'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('zip') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group mb-30 row">
                                <label for="suite" class="col-md-4 col-form-label text-md-right">Suite</label>
                                <div class="col-md-6">
                                    <input type="text"
                                           class="form-control{{ $errors->has('suite') ? ' is-invalid' : '' }}"
                                           value="{{ old('suite') }}"
                                           id="suite" name="suite" placeholder="e.g. 14048">
                                    @if ($errors->has('suite'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('suite') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group mb-30 row">
                                <label for="buzzer" class="col-md-4 col-form-label text-md-right">Buzzer</label>
                                <div class="col-md-6">
                                    <input type="text"
                                           class="form-control{{ $errors->has('buzzer') ? ' is-invalid' : '' }}"
                                           value="{{ old('buzzer') }}"
                                           id="buzzer" name="buzzer" placeholder="e.g. 14048">
                                    @if ($errors->has('buzzer'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('buzzer') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group mb-30 row">
                                <label for="telephone" class="col-md-4 col-form-label text-md-right">Telephone</label>
                                <div class="col-md-6">
                                    <input required type="text"
                                           class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }}"
                                           value="{{ old('telephone') }}"
                                           id="telephone" name="telephone"
                                           placeholder="e.g. 212-509-6995">
                                    @if ($errors->has('telephone'))
                                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('telephone') }}</strong>
                        </span>
                                    @endif </div>
                            </div>
                            <div class="form-group mb-30 row">
                                <label for="business_type" class="col-md-4 col-form-label text-md-right">Business
                                    Type
                                </label>
                                <div class="col-md-6">
                                    <select class="form-control" id="business_type"
                                            name="business_type" required>
                                        @if(old('business_type', null) != null)
                                            <option selected
                                                    value="{{ old('business_type') }}">{{ old('business_type') }}</option>
                                        @endif
                                        <option value="Sole">Sole</option>
                                        <option value="Partnership">Partnership</option>
                                        <option value="General">General</option>
                                        <option value="Corporation">Corporation</option>
                                        <option value="Company">Company</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-30 row">
                                <label for="hear_about_us" class="col-md-4 col-form-label text-md-right">How Did You
                                    Hear About Us?
                                </label>
                                <div class="col-md-6">
                                    <select class="form-control" id="hear_about_us"
                                            name="hear_about_us" required>
                                        @if(old('hear_about_us', null) != null)
                                            <option selected
                                                    value="{{ old('hear_about_us') }}">{{ old('hear_about_us') }}</option>
                                        @endif
                                        <option>From Friends</option>
                                        <option>From Online Ad</option>
                                        <option>From Search Engine</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-30 row">
                                <label for="language" class="col-md-4 col-form-label text-md-right">
                                    Language
                                </label>
                                <div class="col-md-6">
                                    <select class="form-control" id="language" name="language"
                                            required>
                                        @if(old('language', null) != null)
                                            <option selected
                                                    value="{{ old('language') }}">{{ old('language') }}</option>
                                        @endif
                                        <option>English</option>
                                        <option>French</option>
                                        <option>Spanish</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-30 row">
                                <label for="website" class="col-md-4 col-form-label text-md-right">Website (if
                                    any)
                                </label>
                                <div class="col-md-6">
                                    <input type="text"
                                           class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}"
                                           value="{{ old('website') }}"
                                           id="website" name="website"
                                           placeholder="e.g. www.hussain-juned.com">
                                    @if ($errors->has('website'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('website') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group mb-30 row">
                                <label for="fax" class="col-md-4 col-form-label text-md-right">Fax (optional)</label>
                                <div class="col-md-6">
                                    <input type="text"
                                           class="form-control{{ $errors->has('fax') ? ' is-invalid' : '' }}"
                                           value="{{ old('fax') }}"
                                           id="fax" name="fax"
                                           placeholder="e.g. www.hussain-juned.com">
                                    @if ($errors->has('fax'))
                                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('fax') }}</strong>
                        </span>
                                    @endif</div>
                            </div>

                            <div class="form-group mb-30 row">
                                <label for="payment_type" class="col-md-4 col-form-label text-md-right">If you are a seller. Preferred Payment type</label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="payment_type" name="payment_type"
                                                              required>
                                        @if(old('payment_type', null) != null)
                                            <option selected
                                                    value="{{ old('payment_type') }}">{{ old('payment_type') }}</option>
                                        @endif
                                        <option value="online">Online</option>
                                        <option value="invoice">Invoice</option>
                                    </select></div>
                            </div>

                            <div class="form-group mb-30 row form-check">
                                <div class="col-md-12 text-center">
                                    <input required type="checkbox"
                                           class="form-check-input{{ $errors->has('terms_and_conditions') ? ' is-invalid' : '' }}"
                                           id="exampleCheck1" name="terms_and_conditions"
                                           value="agree">
                                    <label for="exampleCheck1"
                                           class="form-check-label text-md-right">I agree to the terms and
                                        conditions
                                    </label>
                                    @if ($errors->has('terms_and_conditions'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('terms_and_conditions') }}</strong>
                                     </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn my_account_btn dashboard-btn">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
