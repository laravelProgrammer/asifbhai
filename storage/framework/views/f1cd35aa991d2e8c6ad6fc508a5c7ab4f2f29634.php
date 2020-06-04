<?php $__env->startSection('css'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <style>
        .profile-card {
            margin-bottom: 40px !important;
        }
        .panel-title{
            padding-top: 0;
        }
        .px-10{
            padding-left:10px;
            padding-right:10px;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_header'); ?>
    <h1 class="page-title">
        <i class="voyager-calendar"></i> Availability
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered" style="padding-bottom:5px;">
                    <div class="panel profile-card">
                        <div class="panel-body pt-25">
                             <div class="row">
                                <div class="col-md-3">
                                    <img src="<?php echo e(asset('storage/'.$availability->teacher->avatar)); ?>" width="100%">
                                </div>
                                <div class="col-md-8 pt-4 pl-0">
                                    <h2><?php echo e($availability->teacher->name); ?></h2>
                                    <!-- <p>Software Engineer</p> -->
                                </div>
                             </div>
                        </div>
                    </div>
                    <div class="row px-10">    
                        
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="panel-heading" style="border-bottom:0;">
                                        <h3 class="panel-title">
                                            Level
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="panel-body" style="padding-top:0;">
                                        <?php echo e($availability->level->name); ?>

                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="panel-heading" style="border-bottom:0;">
                                        <h3 class="panel-title">
                                            Subject
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="panel-body" style="padding-top:0;">
                                        <?php echo e($availability->subject->name); ?>

                                    </div>
                                </div>
                            </div> 
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="panel-heading" style="border-bottom:0;">
                                        <h3 class="panel-title">
                                            Start Time
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="panel-body" style="padding-top:0;">
                                        <?php echo e($availability->start); ?>

                                    </div>
                                </div>
                            </div> 
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="panel-heading" style="border-bottom:0;">
                                        <h3 class="panel-title">
                                            End Time
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="panel-body" style="padding-top:0;">
                                        <?php echo e($availability->end); ?>

                                    </div>
                                </div>
                            </div> 
                        </div>
                     </div>

                    <div class="row">
                        <div class="col-md-12 mx-auto text-center">
                            <?php if(auth()->user()->hasRole("student")): ?>
                                <form action="<?php echo e(route('voyager.bookings.store')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="availability_id" value="<?php echo e($availability->id); ?>" />
                                    <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>" />
                                    <button class="btn btn-primary" type="submit">
                                        Book Session
                                    </button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('voyager::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Work/Clients/Web/LesCours/resources/views/vendor/voyager/availabilities/read.blade.php ENDPATH**/ ?>