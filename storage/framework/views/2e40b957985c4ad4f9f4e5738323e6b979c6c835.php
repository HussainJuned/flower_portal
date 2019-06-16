<?php if(session()->has('message')): ?>
    <div class="container my-5">
        <div class="alert alert-success">
            <?php echo e(session()->get('message')); ?>

        </div>
    </div>
<?php endif; ?><?php /**PATH C:\Users\Juned\PhpstormProjects\flowerapp\resources\views/partials/success_message.blade.php ENDPATH**/ ?>