<?php $__env->startSection('title', 'Floral Portal'); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Order Id: <?php echo e($order->id); ?></h1>
        <p>Seller: <?php echo e($order->seller->name); ?></p>
        <p>Buyer: <?php echo e($order->buyer->name); ?></p>
        <p>Product: <?php echo e($order->product->name); ?></p>
        <p>Order Date: <?php echo e($order->order_date); ?></p>
        <p>Status: <?php echo e($order->statusToString()); ?></p>
        <p>Shipping: <?php echo e($order->shipping); ?></p>
        <p>Zip: <?php echo e($order->zip); ?></p>
    </div>
    <?php if($order->status === 5 && auth()->id() === $order->buyer_user_id): ?>
        <div class="container">
            <?php echo $__env->make('partials.product_review_box', ['product_id' => $order->product_id, 'order_id' => $order->id], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>