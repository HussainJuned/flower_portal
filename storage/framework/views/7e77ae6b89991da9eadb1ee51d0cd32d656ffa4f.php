<?php $__env->startSection('title', 'Product Info'); ?>


<?php $__env->startSection('content'); ?>

    <div class="container">
        <h2 class="mb-30 text-center mt-5">Product Info</h2>
        <div class="row mb-3">
            <div class="col-sm-12 mb-3 text-center">
                <a href="<?php echo e(route('userinfos.show', ['userinfo' => $product->user->userinfo->id])); ?>">
                    <figure>
                        <img src="<?php echo e(url('/')); ?>/<?php echo e($product->photo_url); ?>" class="img-fluid"
                             id="<?php echo e($product->user->name); ?>-product-id-<?php echo e($product->id); ?>"
                             alt="Image Loading Failed"/>
                        <figcaption>View Profile</figcaption>
                    </figure>
                </a>
            </div>
            <div class="col-sm-12 mb-3 text-center">
                <h5 class="mb-30">
                    <strong>Title: <?php echo e($product->name); ?></strong>
                </h5>
                <div class="row">
                    <div class="col-sm-6 mb-30">
                        <p>Sold By: <?php echo e($product->pack); ?></p>
                        <p>Description: <?php echo e($product->description); ?></p>
                        <p>Stem in Bunch: <?php echo e($product->number_of_stem); ?></p>
                        <p>Stem price: <?php echo e($product->price_per_stem_bunch); ?></p>
                        <p>Price: <?php echo e($product->price); ?></p>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <p>Origin: <?php echo e($product->origin); ?></p>
                        <p>Height: <?php echo e($product->height); ?></p>
                        <p>Colour: <?php echo e($product->colour); ?></p>
                        <p>Category: <?php echo e($product->category); ?></p>
                        <p>Available Date: <?php echo e($product->available_date); ?></p>
                        <p>Stock: <?php echo e($product->stock); ?></p>
                    </div>
                </div>
                <h2 class="mb-30">Reviews</h2>

                    <?php if($product->reviews->first()): ?>
                    <div class="row">
                        <?php $__currentLoopData = $product->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-6 mb-3">
                                <div class="mb-3">
                                    <div class="card p-3">
                                        <p>Buyer name: <?php echo e($review->order->buyer->name); ?></p>
                                        <p>Rating: <?php echo e($review->quality); ?> / 5</p>
                                        <p>comment: <?php echo e($review->comment); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                        <?php else: ?>
                        <p class="text-center">No review yet</p>
                    <?php endif; ?>

                <?php if(auth()->user()->products->contains('id', $product->id)): ?>
                    <p>
                        <a href="<?php echo e(route('products.edit', ['product' => $product->id])); ?>" class="btn btn-primary">
                            Modify Product
                        </a>
                    </p>
                <?php else: ?>
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
                        <p>Total price:
                            <strong class="total_price">js work needed</strong>
                        </p>
                        <div class="form-group my-3">
                            <label for="order_date">Choose in which date you want to order</label>
                            <select class="" id="order_date" name="order_date" required>
                                <?php if(old('order_date', null) != null): ?>
                                    <option selected value="<?php echo e(old('order_date')); ?>"><?php echo e(old('order_date')); ?></option>
                                <?php endif; ?>
                                <?php if($product->availableDates()): ?>
                                    <?php $__currentLoopData = $product->availableDates(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($order_date); ?>"><?php echo e($order_date); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                        <option value="false">not available</option>
                                <?php endif; ?>

                            </select>
                            <?php if($errors->has('order_date')): ?>
                                <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('order_date')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                        <?php if($product->availableDates()): ?>
                            <button type="submit" class="btn btn-primary">Order</button>
                        <?php else: ?>
                            <button type="button" class="btn btn-primary" disabled>Not Available</button>
                        <?php endif; ?>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>