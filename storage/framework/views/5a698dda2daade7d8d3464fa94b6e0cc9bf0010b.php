<?php $__env->startSection('title', 'Profile Information'); ?>


<?php $__env->startSection('content'); ?>

    <div class="container">
        <h2 class="mb-30">User Info</h2>
        <div class="row">
            <div class="col-sm-6">
                <p> Username: <?php echo e($userinfo->user->name); ?></p>
                <p> Email: <?php echo e($userinfo->user->email); ?></p>
                <p> Name: <?php echo e($userinfo->title); ?> <?php echo e($userinfo->first_name); ?> <?php echo e($userinfo->last_name); ?></p>
                
                <p> Company Name: <?php echo e($userinfo->company_name); ?></p>
                <p> Business Type: <?php echo e($userinfo->business_type); ?></p>
                <p> Language: <?php echo e($userinfo->language); ?></p>
            </div>
            <div class="col-sm-6">
                <p> Country: <?php echo e($userinfo->country); ?></p>
                <p> state: <?php echo e($userinfo->state); ?></p>
                <p> city: <?php echo e($userinfo->city); ?></p>
                <p> delivery_address_1: <?php echo e($userinfo->delivery_address_1); ?></p>
                <p> delivery_address_2: <?php echo e($userinfo->delivery_address_2); ?></p>
                <p> zip: <?php echo e($userinfo->zip); ?></p>
                <p> telephone: <?php echo e($userinfo->telephone); ?></p>
                <?php if($userinfo->fax): ?>
                    <p> Fax: <?php echo e($userinfo->fax); ?></p>
                <?php endif; ?>
                <?php if($userinfo->website): ?>
                    <p> Website:
                        <a target="_blank" href="https://<?php echo e($userinfo->website); ?>"><?php echo e($userinfo->website); ?></a></p>
                <?php endif; ?>
            </div>
        </div>

        <h2 class="mb-30">All Available Products (which has status active and available_date_end not smaller than today)</h2>
        <?php if(!$userinfo->user->isSeller()): ?>
            <p> This User Has Not any product to show</p>

        <?php else: ?>
            <div class="row">
                <?php $__currentLoopData = $userinfo->user->availableProducts()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-6 mb-3">
                    <?php echo $__env->make('partials.product_box', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        <?php endif; ?>

        <h2 class="mb-30">Reviews</h2>
        <div class="row">
            <div class="col-sm-6 mb-3">
                <h4>Seller Account</h4>
                <?php if($userinfo->user->products()->first()): ?>
                    <?php $__currentLoopData = $userinfo->user->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($product->reviews()->first()): ?>
                            <?php $__currentLoopData = $product->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="mb-3">
                                    <div class="card p-3">
                                        <p>Buyer name: <?php echo e($review->order->buyer->name); ?></p>
                                        <p>Rating: <?php echo e($review->quality); ?> / 5</p>
                                        <p>comment: <?php echo e($review->comment); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>

            <div class="col-sm-6 mb-3">
                <h4>Buyer Account</h4>
                <?php if($userinfo->user->buyerAccountReviews): ?>
                    <?php $__currentLoopData = $userinfo->user->buyerAccountReviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="mb-3">
                            <div class="card p-3">
                                <p>Seller name: <?php echo e($review->getSeller->name); ?></p>
                                <p>Rating: <?php echo e($review->quality); ?> / 5</p>
                                <p>comment: <?php echo e($review->comment); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <p> No Review</p>
                <?php endif; ?>
            </div>


        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>