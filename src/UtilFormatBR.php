<?php

namespace Phablo\Helpers;
use Carbon\Carbon;

class UtilFormatBR 
{    
    public static function toFloat($value, $prefix = 'R$ ', $numberDecimal = 2, $sufix = NULL)
    {
        try {
            if ($value !== NULL) {
                $number = $prefix . number_format($value, $numberDecimal, ',', '.');
                if ($sufix != NULL) {
                    return $number . $sufix;
                }
                return $number;
            }
        } catch (\Exception $e) {}
        
        return $value;
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

    public static function toDate($value, $createFromFormat = 'Y-m-d H:i:s.000', $toFormat = 'd/m/Y')
    {
        try {
            if ($value) {
                return Carbon::createFromFormat($createFromFormat, $value)->format($toFormat);
            }
        } catch (\Exception $e) {}
        
        return $value;
    }

    public static function toBoolean($value)
    {
        try {
            if (in_array($value, ['Sim', 'Não'], true)) {
                return $value;
            }

            return $value == 1 ? 'Sim' : 'Não';
        } catch (\Exception $e) {
            return $value;
        }
    }
}