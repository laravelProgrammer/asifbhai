

<?php
  use App\User
?>

<?php $__env->startSection('extra-css-files'); ?>

  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('website-assets/styles/contact.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('website-assets/styles/contact_responsive.css')); ?>">

<?php $__env->stopSection(); ?>

   <?php $__env->startSection('main-content'); ?>
     <br><br><br><br><br>
<div class="contact">
  

     <div class="contact_info_container">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
          </div>
          <!-- Contact Form -->
          <div class="col-lg-6">
            <div class="contact_form">
              <?php echo $__env->make('message.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              <div class="contact_info_title">Login Form</div>
              <form action="<?php echo e(route('login')); ?>" class="comment_form" method="post">
                <?php echo csrf_field(); ?>
                
                <div>
                  <div class="form_title">Email</div>
                  <input type="email" class="comment_input" required="required" name="email">
                </div>

                <div>
                  <div class="form_title">Password</div>
                  <input type="password" class="comment_input" required="required" name="password">
                </div>
               
                <div>
                  <button type="submit" class="comment_button trans_200">submit</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
    </div>
    <?php $__env->startSection('extra-js-files'); ?> 
     <script src="<?php echo e(asset('website-assets/js/contact.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

   <?php $__env->stopSection(); ?>
<?php echo $__env->make('web-site.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\asifbhai\LesCours-master\resources\views/web-site/pages/login.blade.php ENDPATH**/ ?>