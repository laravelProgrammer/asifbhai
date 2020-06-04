<?php
namespace App\FormFields;

use TCG\Voyager\FormFields\AbstractHandler;

class DateTimePickerField extends AbstractHandler
{
    protected $codename = 'datetimepicker';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('formfields.datetimepicker', [
            'row' => $row,
            'options' => $options,
            'dataType' => $dataType,
            'dataTypeContent' => $dataTypeContent
        ]);
    }
}
