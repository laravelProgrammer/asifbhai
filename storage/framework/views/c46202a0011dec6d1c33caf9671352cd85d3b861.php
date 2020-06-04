<?php $__env->startSection('page_title', __('voyager::generic.viewing').' '.$dataType->getTranslatedAttribute('display_name_plural')); ?>
<?php $__env->startSection('page_header'); ?>
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="<?php echo e($dataType->icon); ?>"></i> <?php echo e($dataType->getTranslatedAttribute('display_name_plural')); ?>

        </h1>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add', app($dataType->model_name))): ?>
            <a href="<?php echo e(route('voyager.'.$dataType->slug.'.create')); ?>" class="btn btn-success btn-add-new">
                <i class="voyager-plus"></i> <span><?php echo e(__('voyager::generic.add_new')); ?></span>
            </a>
        <?php endif; ?>
        <?php echo $__env->make('voyager::multilingual.language-selector', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-content browse container-fluid">
        <?php echo $__env->make('voyager::alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <?php if($isAdmin): ?>
                                <table id="dataTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Booking Id</th>
                                            <th>Student</th>
                                            <th>Teacher</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Status</th>
                                            <th>Booking Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($booking->id); ?></td>
                                            <td><?php echo e($booking->user->name); ?></td>
                                            <td><?php echo e($booking->availability->teacher->name); ?></td>
                                            <td><?php echo e($booking->availability->start); ?></td>
                                            <td><?php echo e($booking->availability->end); ?></td>
                                            <td><?php echo e($booking->status); ?></td>
                                            <td><?php echo e($booking->created_at); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                            <?php if($isStudent): ?>
                                <table id="dataTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Booking Id</th>
                                            <th>Teacher</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Status</th>
                                            <th>Booking Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($booking->id); ?></td>
                                            <td><?php echo e($booking->availability->teacher->name); ?></td>
                                            <td><?php echo e($booking->availability->start); ?></td>
                                            <td><?php echo e($booking->availability->end); ?></td>
                                            <td><?php echo e($booking->status); ?></td>
                                            <td><?php echo e($booking->created_at); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>

                            <?php if($isTeacher): ?>
                                <table id="dataTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Booking Id</th>
                                            <th>Student</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Status</th>
                                            <th>Booking Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($booking->id); ?></td>
                                            <td><?php echo e($booking->user->name); ?></td>
                                            <td><?php echo e($booking->availability->start); ?></td>
                                            <td><?php echo e($booking->availability->end); ?></td>
                                            <td><?php echo e($booking->status); ?></td>
                                            <td><?php echo e($booking->created_at); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal modal-primary fade" tabindex="-1" id="ask_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo e(__('voyager::generic.close')); ?>"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"> <?php echo e(__('Do you want to edit or delete')); ?>?</h4>
                </div>
                <div class="modal-footer">
                    <form action="#" id="delete_form" method="POST">
                        <?php echo e(method_field('DELETE')); ?>

                        <?php echo e(csrf_field()); ?>

                        <input type="submit" class="btn btn-danger pull-left delete-confirm" value="<?php echo e(__('Delete')); ?>">
                    </form>
                <a href="#" class="btn btn-primary pull-right"><?php echo e(__('Edit')); ?></a>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
    <style>

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('voyager::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Work/Clients/Web/LesCours/resources/views/vendor/voyager/bookings/browse.blade.php ENDPATH**/ ?>