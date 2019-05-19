<?php $__env->startSection('title', 'Floral Portal'); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <?php if(session()->has('message')): ?>
                <div class="my-5 container">
                    <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary">Upload another product</a>
                </div>
            <?php endif; ?>
            
            <?php echo $__env->make('partials.errors_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php if(count($products) < 1): ?>
                <div class="col-sm-12 mb-3">
                    <div class="card p-5">
                        <p class="mb-3"> You dont have any product to show</p>
                        <p>
                            <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary">Upload product</a>
                        </p>
                    </div>
                </div>
            <?php endif; ?>

            <div class="col-sm-6 my-3">
                <a href="" class="btn btn-warning">Export product to excel</a>
            </div>
            <div class="col-sm-6 my-3">
                <form action="<?php echo e(route('product.import.excel')); ?>" enctype="multipart/form-data" method="post">
                    <?php echo csrf_field(); ?>

                    <label for="choose_excel">
                        Import Prdouct from excel
                        <input type="file" id="choose_excel" name="excel_file" class="form-control">
                    </label>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>

            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-12 mb-3">
                    <?php echo $__env->make('partials.product_box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Juned\PhpstormProjects\flowerapp\resources\views/pages/user_infos/my_products.blade.php ENDPATH**/ ?>