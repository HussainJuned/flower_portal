<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">View and Update Your Information</div>
                    <div class="card-body">
                        <form method="POST"
                              action="<?php echo e(route('userinfos.update', ['userinfo' => auth()->user()->userinfo->id])); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <h6 class="text-center py-3">Personal Information</h6>
                            <div class="form-group mb-30 row">
                                <label for="company_name" class="col-md-4 col-form-label text-md-right">Company
                                    Name
                                </label>
                                <div class="col-md-6">
                                    <input required type="text"
                                           class="form-control<?php echo e($errors->has('company_name') ? ' is-invalid' : ''); ?>"
                                           value="<?php echo e($userinfo->company_name); ?>"
                                           id="company_name" name="company_name"
                                           placeholder="e.g. Walmart">
                                    <?php if($errors->has('company_name')): ?>
                                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('company_name')); ?></strong>
                        </span>
                                    <?php endif; ?></div>
                            </div>
                            <div class="form-group mb-30 row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="title" name="title" required>
                                        <?php if($userinfo->title != null): ?>
                                            <option selected
                                                    value="<?php echo e($userinfo->title); ?>"><?php echo e($userinfo->title); ?></option>
                                        <?php endif; ?>
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
                                           class="form-control<?php echo e($errors->has('first_name') ? ' is-invalid' : ''); ?>"
                                           value="<?php echo e($userinfo->first_name); ?>"
                                           id="first_name" name="first_name" placeholder="e.g. John">
                                    <?php if($errors->has('first_name')): ?>
                                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('first_name')); ?></strong>
                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group mb-30 row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>
                                <div class="col-md-6">
                                    <input required type="text"
                                           class="form-control<?php echo e($errors->has('last_name') ? ' is-invalid' : ''); ?>"
                                           value="<?php echo e($userinfo->last_name); ?>"
                                           id="last_name" name="last_name" placeholder="e.g. Doe">
                                    <?php if($errors->has('last_name')): ?>
                                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('last_name')); ?></strong>
                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group mb-30 row">
                                <label for="country1" class="col-md-4 col-form-label text-md-right">Country</label>
                                <div class="col-md-6">
                                    <input list="country" name="country"
                                           class="form-control<?php echo e($errors->has('country') ? ' is-invalid' : ''); ?>"
                                           value="<?php echo e($userinfo->country); ?>" required>
                                    <datalist id="country">
                                        <?php echo $__env->make('partials.all_country_options', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </datalist>
                                    <?php if($errors->has('country')): ?>
                                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('country')); ?></strong>
                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group mb-30 row">
                                <label for="state" class="col-md-4 col-form-label text-md-right">State</label>
                                <div class="col-md-6">
                                    <input required type="text"
                                           class="form-control<?php echo e($errors->has('state') ? ' is-invalid' : ''); ?>"
                                           value="<?php echo e($userinfo->state); ?>"
                                           id="state" name="state" placeholder="e.g. New York">
                                    <?php if($errors->has('state')): ?>
                                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('state')); ?></strong>
                        </span>
                                    <?php endif; ?> </div>
                            </div>
                            <div class="form-group mb-30 row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">City</label>
                                <div class="col-md-6">
                                    <input required type="text"
                                           class="form-control<?php echo e($errors->has('city') ? ' is-invalid' : ''); ?>"
                                           value="<?php echo e($userinfo->city); ?>"
                                           id="city" name="city" placeholder="e.g. Dunkirk">
                                    <?php if($errors->has('city')): ?>
                                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('city')); ?></strong>
                        </span>
                                    <?php endif; ?> </div>
                            </div>
                            <div class="form-group mb-30 row">
                                <label for="delivery_address_1" class="col-md-4 col-form-label text-md-right">Delivery
                                    Address
                                </label>
                                <div class="col-md-6">
                                    <input required type="text"
                                           class="form-control<?php echo e($errors->has('delivery_address_1') ? ' is-invalid' : ''); ?>"
                                           value="<?php echo e($userinfo->delivery_address_1); ?>"
                                           id="delivery_address_1" name="delivery_address_1"
                                           placeholder="Enter Your Address Here">
                                    <?php if($errors->has('delivery_address_1')): ?>
                                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('delivery_address_1')); ?></strong>
                        </span>
                                    <?php endif; ?> </div>
                            </div>
                            <div class="form-group mb-30 row">
                                <label for="delivery_address_2" class="col-md-4 col-form-label text-md-right">Delivery
                                    Address Line 2 (Optional)
                                </label>
                                <div class="col-md-6">
                                    <input type="text"
                                           class="form-control<?php echo e($errors->has('delivery_address_2') ? ' is-invalid' : ''); ?>"
                                           value="<?php echo e($userinfo->delivery_address_2); ?>"
                                           id="delivery_address_2" name="delivery_address_2"
                                           placeholder="Continue Entering Your Address Here If No Space In Above Field">
                                    <?php if($errors->has('delivery_address_2')): ?>
                                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('delivery_address_2')); ?></strong>
                        </span>
                                    <?php endif; ?> </div>
                            </div>
                            <div class="form-group mb-30 row">
                                <label for="zip" class="col-md-4 col-form-label text-md-right">Zip</label>
                                <div class="col-md-6">
                                    <input required type="text"
                                           class="form-control<?php echo e($errors->has('zip') ? ' is-invalid' : ''); ?>"
                                           value="<?php echo e($userinfo->zip); ?>"
                                           id="zip" name="zip" placeholder="e.g. 14048">
                                    <?php if($errors->has('zip')): ?>
                                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('zip')); ?></strong>
                        </span>
                                    <?php endif; ?> </div>
                            </div>

                            <div class="form-group mb-30 row">
                                <label for="suite" class="col-md-4 col-form-label text-md-right">Suite</label>
                                <div class="col-md-6">
                                    <input type="text"
                                           class="form-control<?php echo e($errors->has('suite') ? ' is-invalid' : ''); ?>"
                                           value="<?php echo e($userinfo->user->buyerAddresses[0]->suite); ?>"
                                           id="suite" name="suite">
                                    <?php if($errors->has('suite')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('suite')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group mb-30 row">
                                <label for="buzzer" class="col-md-4 col-form-label text-md-right">Buzzer</label>
                                <div class="col-md-6">
                                    <input type="text"
                                           class="form-control<?php echo e($errors->has('buzzer') ? ' is-invalid' : ''); ?>"
                                           value="<?php echo e($userinfo->user->buyerAddresses[0]->buzzer); ?>"
                                           id="buzzer" name="buzzer" placeholder="e.g. 14048">
                                    <?php if($errors->has('buzzer')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('buzzer')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group mb-30 row">
                                <label for="telephone" class="col-md-4 col-form-label text-md-right">Telephone</label>
                                <div class="col-md-6">
                                    <input required type="text"
                                           class="form-control<?php echo e($errors->has('telephone') ? ' is-invalid' : ''); ?>"
                                           value="<?php echo e($userinfo->telephone); ?>"
                                           id="telephone" name="telephone"
                                           placeholder="e.g. 212-509-6995">
                                    <?php if($errors->has('telephone')): ?>
                                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('telephone')); ?></strong>
                        </span>
                                    <?php endif; ?> </div>
                            </div>
                            <div class="form-group mb-30 row">
                                <label for="business_type" class="col-md-4 col-form-label text-md-right">Business
                                    Type
                                </label>
                                <div class="col-md-6">
                                    <select class="form-control" id="business_type"
                                            name="business_type" required>
                                        <?php if($userinfo->business_type != null): ?>
                                            <option selected
                                                    value="<?php echo e($userinfo->business_type); ?>"><?php echo e($userinfo->business_type); ?></option>
                                        <?php endif; ?>
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
                                        <?php if($userinfo->hear_about_us != null): ?>
                                            <option selected
                                                    value="<?php echo e($userinfo->hear_about_us); ?>"><?php echo e($userinfo->hear_about_us); ?></option>
                                        <?php endif; ?>
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
                                        <?php if($userinfo->language != null): ?>
                                            <option selected
                                                    value="<?php echo e($userinfo->language); ?>"><?php echo e($userinfo->language); ?></option>
                                        <?php endif; ?>
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
                                           class="form-control<?php echo e($errors->has('website') ? ' is-invalid' : ''); ?>"
                                           value="<?php echo e($userinfo->website); ?>"
                                           id="website" name="website"
                                           placeholder="e.g. www.hussain-juned.com">
                                    <?php if($errors->has('website')): ?>
                                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('website')); ?></strong>
                        </span>
                                    <?php endif; ?></div>
                            </div>
                            <div class="form-group mb-30 row">
                                <label for="fax" class="col-md-4 col-form-label text-md-right">Fax (optional)</label>
                                <div class="col-md-6">
                                    <input type="text"
                                           class="form-control<?php echo e($errors->has('fax') ? ' is-invalid' : ''); ?>"
                                           value="<?php echo e($userinfo->fax); ?>"
                                           id="fax" name="fax"
                                           placeholder="e.g. www.hussain-juned.com">
                                    <?php if($errors->has('fax')): ?>
                                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('fax')); ?></strong>
                        </span>
                                    <?php endif; ?></div>
                            </div>

                            <div class="form-group mb-30">
                                <label for="payment_type">If you are a seller. Preferred Payment type</label>
                                <select class="form-control" id="payment_type" name="payment_type" required>
                                    <option value="online"
                                            <?php if($userinfo->payment_type === 'online'): ?>
                                            selected
                                        <?php endif; ?>
                                    >Online
                                    </option>
                                    <option value="invoice"
                                            <?php if($userinfo->payment_type === 'invoice'): ?>
                                            selected
                                        <?php endif; ?>
                                    >Invoice
                                    </option>
                                </select>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Juned\PhpstormProjects\flowerapp\resources\views/pages/user_infos/edit.blade.php ENDPATH**/ ?>