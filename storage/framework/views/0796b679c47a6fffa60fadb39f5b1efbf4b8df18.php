<?php $__env->startSection('title', 'Search'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2 class="my-3">Search</h2>
        <div class="row">
            <div class="col-sm-6">
                <form action="<?php echo e(route('search.flower')); ?>" method="get" class="my-3">
                    <div class="form-group mb-30">
                        <label for="search_flower">Search for Flowers </label>
                        <input type="text" class="form-control<?php echo e($errors->has('search_flower') ? ' is-invalid' : ''); ?>"
                               value="<?php echo e(old('search_flower')); ?>"
                               id="search_flower" name="search_flower" placeholder="e.g. Rose">
                        <?php if($errors->has('search_flower')): ?>
                            <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('search_flower')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group mb-30">
                        <label for="available_date">Available Date</label>
                        <input type="date"
                               class="form-control<?php echo e($errors->has('available_date') ? ' is-invalid' : ''); ?>"
                               value="<?php echo e(old('available_date')); ?>"
                               id="available_date" name="available_date" placeholder="e.g. red">
                        <?php if($errors->has('available_date')): ?>
                            <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('available_date')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
                <form action="<?php echo e(route('search.seller')); ?>" method="get" class="my-5">
                    <div class="form-group mb-30">
                        <label for="search_seller">Search for Seller </label>
                        <input type="text" class="form-control<?php echo e($errors->has('search_seller') ? ' is-invalid' : ''); ?>"
                               value="<?php echo e(old('search_seller')); ?>"
                               id="search_seller" name="search_seller" placeholder="e.g. anderson">
                        <?php if($errors->has('search_seller')): ?>
                            <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('search_seller')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>