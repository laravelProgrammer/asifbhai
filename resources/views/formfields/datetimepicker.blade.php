<div class="form-group">
    <div class='input-group date datetimepicker'>
        <input type='text' class="form-control" name="{{ $row->field }}"
        data-name="{{ $row->display_name }}"
        @if($row->required == 1) required @endif
        placeholder="{{ isset($options->placeholder)? old($row->field, $options->placeholder): $row->display_name }}"
        value="@if(isset($dataTypeContent->{$row->field})){{ old($row->field, $dataTypeContent->{$row->field}) }}@else{{old($row->field)}}@endif">

        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
</div>
