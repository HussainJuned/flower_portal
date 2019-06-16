<div class="card p-5 product_box my-5">
    <div class="row mb-3">
        <div class="col-sm-6 mb-3">
            <a href="<?php echo e(route('userinfos.show', ['userinfo' => $product->user->userinfo->id])); ?>">
                <figure>
                    <img src="<?php echo e(url('/')); ?>/<?php echo e($product->photo_url); ?>" class="img-fluid"
                         id="<?php echo e($product->user->name); ?>-product-id-<?php echo e($product->id); ?>"
                         alt="Image Loading Failed"/>
                    <figcaption>View Profile</figcaption>
                </figure>
            </a>
        </div>
        <div class="col-sm-6 mb-3">
            <h5>
                <strong><?php echo e($product->name); ?></strong>
            </h5>
            <p>Sold By: <?php echo e($product->pack); ?></p>
            <p>Stem in Bunch: <?php echo e($product->number_of_stem); ?></p>
            <p>Stem price: <?php echo e($product->price_per_stem_bunch); ?></p>
            <p>Price: <?php echo e($product->price); ?></p>
            <?php if($product->review): ?>
                <p>Reviews: (<?php echo e(round($product->reviewsAvg->first()->avg_quality, 2)); ?> / 5)</p>
            <?php else: ?>
                <p>Reviews: no review yet</p>
            <?php endif; ?>

            <p>
                <a href="<?php echo e(route('products.show', ['product' => $product->id])); ?>" class="btn btn-primary">View Full Details</a>
            </p>
            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user()->products->contains('id', $product->id)): ?>
                <p>
                    <a href="<?php echo e(route('products.edit', ['product' => $product->id])); ?>" class="btn btn-primary">Modify Product</a>
                </p>
                <?php else: ?>
                    <p>
                    <form action="<?php echo e(route('order.store', ['product' => $product->id])); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group my-3">
                            <label for="quantity">Quantity</label>
                            <input required type="number"
                                   class="<?php echo e($errors->has('quantity') ? ' is-invalid' : ''); ?>"
                                   min="1" max="100" step="1"
                                   id="quantity" name="quantity" value="1">
                            <?php if($errors->has('quantity')): ?>
                                <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('quantity')); ?></strong>
                        </span>
                            <?php endif; ?>
                        </div>
                        <p>Total price: <strong class="total_price">js work needed</strong></p>
                        <div class="form-group my-3">
                            <label for="order_date">Choose in which date you want to order</label>
                            <select class="form-control" id="order_date" name="order_date" required>
                                <?php if(old('order_date', null) != null): ?>
                                    <option selected value="<?php echo e(old('order_date')); ?>"><?php echo e(old('order_date')); ?></option>
                                <?php endif; ?>
                                <?php $__currentLoopData = $product->availableDates(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($order_date); ?>"><?php echo e($order_date); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('order_date')): ?>
                                <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('order_date')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Order</button>
                    </form>
                    </p>
                <?php endif; ?>
            <?php else: ?>
                <p>
                    <form action="<?php echo e(route('order.store', ['product' => $product->id])); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group my-3">
                            <label for="quantity">Quantity</label>
                            <input required type="number"
                                   class="<?php echo e($errors->has('quantity') ? ' is-invalid' : ''); ?>"
                                   min="1" max="100" step="1"
                                   id="quantity" name="quantity" value="1">
                            <?php if($errors->has('quantity')): ?>
                                <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('quantity')); ?></strong>
                        </span>
                            <?php endif; ?>
                        </div>
                <p>Total price: <strong class="total_price">js work needed</strong></p>
                <div class="form-group my-3">
                    <label for="order_date">Choose in which date you want to order</label>
                    <select class="form-control" id="order_date" name="order_date" required>
                        <?php if(old('order_date', null) != null): ?>
                            <option selected value="<?php echo e(old('order_date')); ?>"><?php echo e(old('order_date')); ?></option>
                        <?php endif; ?>
                        <?php $__currentLoopData = $product->availableDates(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($order_date); ?>"><?php echo e($order_date); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->has('order_date')): ?>
                        <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('order_date')); ?></strong>
                            </span>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary">Order</button>
                </form>
                </p>
            <?php endif; ?>

        </div>
    </div>
</div><?php /**PATH C:\Users\Juned\PhpstormProjects\flowerapp\resources\views/partials/product_box.blade.php ENDPATH**/ ?>