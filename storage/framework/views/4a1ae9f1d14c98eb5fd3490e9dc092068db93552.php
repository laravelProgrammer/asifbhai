<?php $__env->startSection('content'); ?>

      <h1>This is awesome!!</h1>
      <?php echo e(count($levels)); ?>

      <?php echo e(count($subjects)); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('voyager::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Work/Clients/Web/LesCours/resources/views/tutor/search.blade.php ENDPATH**/ ?>