<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php echo $__env->make('web-site.layouts.header-css-files', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<div class="super_container">

   <?php echo $__env->make('web-site.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	

   <?php $__env->startSection('main-content'); ?>
      <?php echo $__env->yieldSection(); ?>

   <?php echo $__env->make('web-site.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
</div>
<?php echo $__env->make('web-site.layouts.footer-js-files', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH E:\xampp\htdocs\asifbhai\LesCours-master\resources\views/web-site/layouts/app.blade.php ENDPATH**/ ?>