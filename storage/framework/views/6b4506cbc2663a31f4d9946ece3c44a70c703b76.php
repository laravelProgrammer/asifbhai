<?php $__env->startSection('css'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<style>
		.profile-card {
			box-shadow: 0 6px 10px rgba(0,0,0,.1) !important;
			border:1px solid #EEE !important;
		}
		.profile-card:hover{
			box-shadow: 0 6px 10px rgba(0,0,0,.5) !important;
		}
		.ptb-20{
			padding-top: 40px !important;
			padding-bottom: 40px !important;
		}
		.pt-4{
			padding-top:4px !important;
		}
		.pl-0{
			padding-left:0px !important;
		}
		.pt-25{
			padding-top:25px !important;
		}
	</style>    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_title', 'List Tutors'); ?>

<?php $__env->startSection('page_header'); ?>
    <h1 class="page-title">
        <i class="voyager-list"></i>
        List Tutors
    </h1>
    <?php echo $__env->make('voyager::multilingual.language-selector', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-body ptb-20">
                            	<?php $__currentLoopData = $availabilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $availability): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                            	<div class="col-md-4">
	                            		<a href="<?php echo e(route('voyager.availabilities.show', $availability->id)); ?>">
		                            		<div class="panel profile-card">
		                            			<div class="panel-header">
		                            				<img src="<?php echo e(asset('storage/users/banner.jpg')); ?>" width="100%" height="250px">
		                            			</div>
		                            			<div class="panel-body pt-25">
		                            				 <div class="row">
		                            				 	<div class="col-md-3">
		                            				 		<img src="<?php echo e(asset('storage/users/default.png')); ?>" width="100%">
		                            				 	</div>
		                            				 	<div class="col-md-8 pt-4 pl-0">
		                            				 		<h4><?php echo e($availability->teacher->name); ?></h4>
		                            				 		<p>Software Engineer</p>
		                            				 	</div>
		                            				 </div>
		                            				 Body
		                            			</div>
		                            			<div class="panel-footer">
		                            				 footer
		                            			</div>
		                            		</div>
		                            	</a>
	                            	</div>
                            	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('voyager::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Work/Clients/Web/LesCours/resources/views/tutor/list.blade.php ENDPATH**/ ?>