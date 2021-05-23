<?php

namespace Phablo\Helpers;


class UtilFormatBR {
    
    public static function toFloat($value, $prefix = '', $numberDecimal = 2, $sufix = NULL)
    {
        if ($value !== NULL) {
            $number = $prefix . number_format($value, $numberDecimal, ',', '.');
            if ($sufix != NULL) {
                return $number . $sufix;
            }
            return $number;
        }
        return NULL;
    }

    public static function isFloat($_value, $_currency = false)
    {
        if ($_currency) {
            $regExp = '/^R\$ (\d{1,3}(\.\d{3})*|\d+)(\,\d{2})?$/';
        } else {
            $regExp = '/^\d{1,3}((\.\d{3})*|\d+)(\,\d{2})?$/';
        }

        return preg_match($regExp, $_value)>0;
    }

}