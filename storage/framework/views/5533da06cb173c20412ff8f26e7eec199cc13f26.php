

<?php
  use App\User
?>

<?php $__env->startSection('extra-css-files'); ?>

  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('website-assets/styles/contact.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('website-assets/styles/contact_responsive.css')); ?>">
   <style type="text/css">
       tr:nth-child(even) {background: lavender}
       tr:nth-child(odd) {background: #FFF}
   </style>
<?php $__env->stopSection(); ?>

   <?php $__env->startSection('main-content'); ?>

   <!-- Home -->

   <div class="home">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="<?php echo e(route('/')); ?>">Home</a></li>
                            <li>Teacher Information</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>          
   </div>

   <!-- Contact -->

   <div class="contact">
    
    <!-- Contact Info -->

    <div class="contact_info_container">
        <div class="container">
            
                <!-- Contact Form -->
               
                    <div class="contact_form">
                        <form action="<?php echo e(route('add-to-cart')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            
                        
                        <div class="contact_info_title" style="font-size: 20px;">Teacher Detail</div>
                            <br>
                        <div class="row">
                             <div class="col-lg-4">
                                <div class="course_image">
                                   <?php if(!empty($teacher->avatar)): ?>
                                   <img src="<?php echo e(asset('website-assets/default/default.jpg')); ?>" alt="">
                                   <?php else: ?>
                                   <img src="<?php echo e(asset('users/'.$teacher->avatar)); ?>" alt="">
                                   <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-lg-8">

                                <div class="col-lg-8">
                                    <div>
                                        <div class="form_title">Id</div>
                                        <input type="text" class="comment_input" readonly="true" value="<?php echo e($teacher->id); ?>">
                                    </div>
                                </div>
                                <br>
                            <div class="col-lg-8">
                                <div>
                                    <div class="form_title">Name</div>
                                    <input type="text" class="comment_input" readonly="true" value="<?php echo e($teacher->name); ?>">
                                </div>
                            </div>
                            <br>
                            <div class="col-lg-8">
                                <div>
                                    <div class="form_title">Email</div>
                                    <input type="text" class="comment_input" readonly= "true" value="<?php echo e($teacher->email); ?>">
                                </div>
                            </div>

                            </div>

                        </div><br> <br>             
                        
                        <div class="contact_info_title" style="font-size: 20px;">Availability Detail</div>
                        <br>
                        <?php echo $__env->make('message.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <table class="table table-condensed table-hover">
                           <thead>
                             <tr>
                                <th>Sr.no</th>
                               <th>Class</th>
                               <th>Subject</th>
                               <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                             </tr>
                           </thead>
                           <tbody>
                            <?php
                              $counter=0
                            ?>
                            <?php $__empty_1 = true; $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teach): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php

                                $subject=User::getsubject($teach->subject_id);
                                $level=User::getlevel($teach->level_id);
                            ?>
                             <tr>
                                <td><?php echo e(++$counter); ?></td>
                               <td><?php echo e($level->name); ?></td>
                               <td><?php echo e($subject->name); ?></td>
                               <td><?php echo e(date('d/m/Y',strtotime($teach->start))); ?> <?php echo e(date('H:i:s',strtotime($teach->start))); ?></td>

                               <td><?php echo e(date('d/m/Y',strtotime($teach->end))); ?> <?php echo e(date('H:i:s',strtotime($teach->end))); ?></td>
                               <td>
                                   <input type="checkbox" name ="avail_id[]" value="<?php echo e($teach->id); ?>"> 
                               </td>
                             </tr>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                             <h2>Record Not Found</h2>
                            <?php endif; ?>  
                           </tbody>
                         </table>
                        <br>
                 <input type="hidden" name="user_id" value="<?php if(Auth::check()): ?> <?php echo e(Auth::user()->id); ?> <?php endif; ?>" id="user">
                 <button type="submit" class="comment_button trans_200">book now</button>
                        
                    </div>
                </form>

              
    
        </div>
    </div>
   </div>


      

    <?php $__env->startSection('extra-js-files'); ?> 
     <script src="<?php echo e(asset('website-assets/js/contact.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

   <?php $__env->stopSection(); ?>
<?php echo $__env->make('web-site.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\asifbhai\LesCours-master\resources\views/web-site/pages/avail.blade.php ENDPATH**/ ?>