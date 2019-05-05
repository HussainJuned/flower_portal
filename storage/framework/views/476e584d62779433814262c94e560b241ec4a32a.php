<?php $__env->startSection('title', 'Buyer Dashboard'); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Buyer Dashboard</h2>
        <h2>Welcome Back <?php echo e(auth()->user()->name); ?></h2>
        <div class="my-5">
            <h1>Upcoming orders</h1>
            <?php if(count($upcoming_orders) > 0): ?>
                <table class="table">
                    <thead>
                    <tr>
                        <td scope="col">Date</td>
                        <td scope="col">Product</td>
                        <td scope="col">Quantity</td>
                        <td scope="col">Unit Price</td>
                        <td scope="col">Total Price</td>
                        <td scope="col">Status</td>
                        <td scope="col">Review</td>
                        <td scope="col">Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $upcoming_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr scope="row">
                            <td><?php echo e($order->order_date); ?></td>
                            <td><?php echo e($order->product->name); ?></td>
                            <td><?php echo e($order->quantity); ?></td>
                            <td><?php echo e($order->unit_price); ?></td>
                            <td><?php echo e($order->total_price); ?></td>
                            <td><?php echo e($order->statusToString()); ?></td>
                            <td>
                                <?php if($order->productReview): ?>
                                    <?php echo e($order->productReview->quality); ?> / 5
                                <?php else: ?>
                                    n/a
                                <?php endif; ?>
                            </td>
                            <td><a href="<?php echo e(route('buyer_dashboard.order.view', ['order' => $order->id])); ?>"
                                   class="btn btn-primary">view</a>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#buo_<?php echo e($order->id); ?>">
                                    edit
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="buo_<?php echo e($order->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Status</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="my-3">
                                                    <?php echo $__env->make('partials.buyer_order_prompt', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>

            <?php else: ?>
                <h4> You have no upcoming orders </h4>
            <?php endif; ?>

        </div>
        <div class="my-5">
            <h1>Past orders</h1>
            <?php if(count($past_orders) > 0): ?>
                <table class="table">
                    <thead>
                    <tr>
                        <td scope="col">Date</td>
                        <td scope="col">Product</td>
                        <td scope="col">Quantity</td>
                        <td scope="col">Unit Price</td>
                        <td scope="col">total</td>
                        <td scope="col">Status</td>
                        <td scope="col">Review</td>
                        <td scope="col">Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $past_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr scope="row">
                            <td><?php echo e($order->order_date); ?></td>
                            <td><?php echo e($order->product->name); ?></td>
                            <td><?php echo e($order->quantity); ?></td>
                            <td><?php echo e($order->unit_price); ?></td>
                            <td><?php echo e($order->total_price); ?></td>
                            <td><?php echo e($order->statusToString()); ?></td>
                            <td>
                                <?php if($order->productReview): ?>
                                    <?php echo e($order->productReview->quality); ?> / 5
                                <?php else: ?>
                                    n/a
                                <?php endif; ?>
                            </td>
                            <td><a href="<?php echo e(route('buyer_dashboard.order.view', ['order' => $order->id])); ?>"
                                   class="btn btn-primary">view</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bpo_<?php echo e($order->id); ?>">
                                    edit
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="bpo_<?php echo e($order->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Status</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="my-3">
                                                    <?php echo $__env->make('partials.buyer_order_prompt', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
                <p class="my-3"> <?php echo e($past_orders->links()); ?></p>

            <?php else: ?>
                <h4> You have no past orders </h4>
            <?php endif; ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>