<?php $__env->startSection('title', 'Floral Portal'); ?>

<?php $__env->startSection('content'); ?>
  <div class="content_middle">
      <main class="text-center">
          <?php if(auth()->guard()->guest()): ?>
              <h2>Welcome to the Floral Portal</h2>
              <p class="mb-5">Please Register or Sign in</p>
              <a href="<?php echo e(route('login')); ?>" class="btn j_btn mr-3">Login</a>
              <a href="<?php echo e(route('register')); ?>" class="btn j_btn">Register</a>
          <?php else: ?>
              <h2>Welcome to the Floral Portal</h2>
              <p class="mb-5"><?php echo e(Auth::user()->name); ?></p>
              <a class="btn j_btn" href="<?php echo e(route('logout')); ?>"
                 onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                  <?php echo e(__('Logout')); ?>

              </a>

              <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                  <?php echo csrf_field(); ?>
              </form>
          <?php endif; ?>
      </main>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>