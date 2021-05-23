<?php

namespace Phablo\Helpers;
use Carbon\Carbon;

class UtilFormatSQL {
    
    public static function toDate($data) 
    {
        return Carbon::createFromFormat('d/m/Y', $data)->format('Y-m-d');
    }

    public static function toFloat($value)
    {
        if ($value) {
            return preg_replace('/[ rR$]/', '', str_replace(',', '.', str_replace('.', '',  $value)));
        }

        return NULL;
    }
}