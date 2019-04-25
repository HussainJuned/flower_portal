@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">View and Update Your Information</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('userinfos.update', ['userinfo' => auth()->user()->userinfo->id]) }}">
                            @csrf
                            @method('PUT')

                            <h6 class="text-center py-3">Personal Information</h6>
                            <div class="form-group mb-30 row">
                                <label for="company_name" class="col-md-4 col-form-label text-md-right">Company
                                    Name
                                </label>
                                <div class="col-md-6">
                                    <input required type="text"
                                           class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}"
                                           value="{{ $userinfo->company_name }}"
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
                                        @if($userinfo->title != null)
                                            <option selected value="{{ $userinfo->title }}">{{ $userinfo->title }}</option>
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
                                           value="{{ $userinfo->first_name }}"
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
                                           value="{{ $userinfo->last_name }}"
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
                                           value="{{ $userinfo->country }}" required>
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
                                           value="{{ $userinfo->state }}"
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
                                           value="{{ $userinfo->city }}"
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
                                           value="{{ $userinfo->delivery_address_1 }}"
                                           id="delivery_address_1" name="delivery_address_1"
                                           placeholder="Enter Your Address Here">
                                    @if ($errors->has('delivery_address_1'))
                                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('delivery_address_1') }}</strong>
                        </span>
                                    @endif </div>
                            </div>
                            <div class="form-group mb-30 row">
                                <label for="delivery_address_2" class="col-md-4 col-form-label text-md-right">Delivery
                                    Address Line 2 (Optional)
                                </label>
                                <div class="col-md-6">
                                    <input type="text"
                                           class="form-control{{ $errors->has('delivery_address_2') ? ' is-invalid' : '' }}"
                                           value="{{ $userinfo->delivery_address_2 }}"
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
                                           value="{{ $userinfo->zip }}"
                                           id="zip" name="zip" placeholder="e.g. 14048">
                                    @if ($errors->has('zip'))
                                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('zip') }}</strong>
                        </span>
                                    @endif </div>
                            </div>
                            <div class="form-group mb-30 row">
                                <label for="telephone" class="col-md-4 col-form-label text-md-right">Telephone</label>
                                <div class="col-md-6">
                                    <input required type="text"
                                           class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }}"
                                           value="{{ $userinfo->telephone }}"
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
                                        @if($userinfo->business_type != null)
                                            <option selected
                                                    value="{{ $userinfo->business_type }}">{{ $userinfo->business_type }}</option>
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
                                        @if($userinfo->hear_about_us != null)
                                            <option selected
                                                    value="{{ $userinfo->hear_about_us }}">{{ $userinfo->hear_about_us }}</option>
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
                                        @if($userinfo->language != null)
                                            <option selected
                                                    value="{{ $userinfo->language }}">{{ $userinfo->language }}</option>
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
                                           value="{{ $userinfo->website }}"
                                           id="website" name="website"
                                           placeholder="e.g. www.hussain-juned.com">
                                    @if ($errors->has('website'))
                                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('website') }}</strong>
                        </span>
                                    @endif</div>
                            </div>
                            <div class="form-group mb-30 row">
                                <label for="fax" class="col-md-4 col-form-label text-md-right">Fax (optional)</label>
                                <div class="col-md-6">
                                    <input type="text"
                                           class="form-control{{ $errors->has('fax') ? ' is-invalid' : '' }}"
                                           value="{{ $userinfo->fax }}"
                                           id="fax" name="fax"
                                           placeholder="e.g. www.hussain-juned.com">
                                    @if ($errors->has('fax'))
                                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('fax') }}</strong>
                        </span>
                                    @endif</div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn j_btn">
                                        Update
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
