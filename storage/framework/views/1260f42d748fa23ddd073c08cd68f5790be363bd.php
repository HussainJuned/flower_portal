<?php $__env->startSection('title', 'Flower Search Results'); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2 class="my-3">Search Results: total
            <?php if($products != null): ?>
                <?php echo e(count($products)); ?>

            <?php else: ?>
                0
            <?php endif; ?>


             product found</h2>
        <form action="<?php echo e(route('search.flower')); ?>" method="get" class="my-3">
            <div class="form-group mb-30 d-flex justify-content-center align-items-center">
                <label for="search_flower mr-3">Search for Flowers: </label>
                <input type="text" class="px-3 mx-3<?php echo e($errors->has('search_flower') ? ' is-invalid' : ''); ?>"
                       value="<?php echo e($keyword); ?>"
                       id="search_flower" name="search_flower" placeholder="e.g. Rose">
                <div class="form-group mb-30 mr-3">
                    <label for="available_date">Available Date</label>
                    <input type="date"
                           class="form-control<?php echo e($errors->has('available_date') ? ' is-invalid' : ''); ?>"
                           value="<?php echo e($a_date); ?>"
                           id="available_date" name="available_date" placeholder="e.g. red">
                    <?php if($errors->has('available_date')): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('available_date')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn btn-primary">Search</button>
            </div>
            <?php if($errors->has('search_flower')): ?>
                <span class="invalid-feedback my-3" role="alert">
                            <strong><?php echo e($errors->first('search_flower')); ?></strong>
                        </span>
            <?php endif; ?>

        </form>
        <div class="row">
            <?php if(count($products) < 1): ?>
                <div class="col-sm-12 mb-3">
                    <div class="card p-5">
                        <p class="mb-3"> Sorry no result found</p>
                    </div>
                </div>
                <?php else: ?>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-6 mb-3">
                            <?php echo $__env->make('partials.product_box', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <div class="my-3">
                <?php echo e($products->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>