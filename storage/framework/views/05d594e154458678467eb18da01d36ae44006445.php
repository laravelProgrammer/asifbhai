<div class="form-group">
    <div class='input-group date datetimepicker'>
        <input type='text' class="form-control" name="<?php echo e($row->field); ?>"
        data-name="<?php echo e($row->display_name); ?>"
        <?php if($row->required == 1): ?> required <?php endif; ?>
        placeholder="<?php echo e(isset($options->placeholder)? old($row->field, $options->placeholder): $row->display_name); ?>"
        value="<?php if(isset($dataTypeContent->{$row->field})): ?><?php echo e(old($row->field, $dataTypeContent->{$row->field})); ?><?php else: ?><?php echo e(old($row->field)); ?><?php endif; ?>">

        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\asifbhai\LesCours-master\resources\views/formfields/datetimepicker.blade.php ENDPATH**/ ?>