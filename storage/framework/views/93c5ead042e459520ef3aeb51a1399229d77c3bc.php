<ul class="nav navbar-nav">

    <?php

        if (Voyager::translatable($items)) {
            $items = $items->load('translations');
        }
        // echo json_encode($items);
    ?>

    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php

            $originalItem = $item;
            if (Voyager::translatable($item)) {
                $item = $item->translate($options->locale);
            }

            $isActive = null;
            $styles = null;
            $icon = null;

            // Background Color or Color
            if (isset($item->color) && $item->color == true) {
                // $styles = 'color:'.$item->color;
            }
            if (isset($item->background) && $item->background == true) {
                $styles = 'background-color:'.$item->color;
            }

            // Check if link is current
            if(url($item->link()) == url()->current()){
                $isActive = 'active';
            }

            // Set Icon
            if(isset($item->icon_class) && $item->icon_class == true){
                $icon = '<i class="icon ' . $item->icon_class . '"></i>';
            }

        ?>

        <li class="<?php echo e($isActive); ?>">
            <a href="<?php echo e(url($item->link())); ?>" target="<?php echo e($item->target); ?>" style="<?php echo e($styles); ?>">
                <?php echo $icon; ?>

                <span class="title"><?php echo e($item->title); ?></span>
            </a>
            <?php if(!$originalItem->children->isEmpty()): ?>
                <?php echo $__env->make('voyager::menu.default', ['items' => $originalItem->children, 'options' => $options], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </ul>
<?php /**PATH /Volumes/Work/Clients/Web/LesCours/resources/views/vendor/voyager/menu/default.blade.php ENDPATH**/ ?>