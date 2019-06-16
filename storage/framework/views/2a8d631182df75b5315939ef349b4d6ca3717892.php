
<?php if($order->status === 4 && auth()->id() === $order->buyer_user_id): ?>
    <div class="my-3">
        <form action="<?php echo e(route('buyer_dashboard.order.updateToReceived', ['order' => $order->id])); ?>" method="post">
            <?php echo csrf_field(); ?>
            <input type="number" name="status" value="5" hidden>
            <button type="submit" class="btn btn-primary">I have received the order</button>
        </form>
    </div>

    <?php elseif($order->status === 5 && auth()->id() === $order->buyer_user_id): ?>
        <?php if($order->productReview): ?>
            <?php echo $__env->make('partials.product_review_box_value',
             ['product_id' => $order->product_id, 'order_id' => $order->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <?php echo $__env->make('partials.product_review_box', ['product_id' => $order->product_id, 'order_id' => $order->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php else: ?>
    <div class="my-3">
        <p>You have no action to perform. Please wait for the seller to deliver the order</p>
    </div>

<?php endif; ?><?php /**PATH C:\Users\Juned\PhpstormProjects\flowerapp\resources\views/partials/buyer_order_prompt.blade.php ENDPATH**/ ?>