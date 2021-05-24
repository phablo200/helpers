<?php

namespace Phablo\Helpers;
use Carbon\Carbon;

class UtilFormatSQL {
    
    public static function toFloat($value, $precision = 2)
    {
        try {
            $value = Util::onlyFloat($value);
            if ($value || $value === 0) {

                if (is_numeric($value) && floatval($value) == $value) {
                    return round($value, $precision);
                }
    
                $float_value = str_replace(',', '.', str_replace('.', '',  $value));
                $float_value = round(floatval($float_value), $precision);
                
                return $float_value;
            }
        } catch (\Exception $e) {}
        
        return $value;
    }

    public static function toDate($value, $createFromFormat = 'd/m/Y', $toFormat = 'Y-m-d 00:00:00.000')
    {
        if ($value) {
            return Carbon::createFromFormat($createFromFormat, $value)->format($toFormat);
        }

        return $value;
    }

    public static function toDateMonth($value, $createFromFormat = 'Y-m', $toFormat = 'Ym')
    {
        if ($value) {
            if ($createFromFormat==='Y-m') {
                $createFromFormat = 'Y-m-d';
                $value = "{$value}-01";
            }
            
            return Carbon::createFromFormat($createFromFormat, $value)->format($toFormat);
        }

        return $value;
    }

    public static function toBoolean($value)
    {
        try {
            $trim = trim($value);
            $removeAccent = Util::removeAccent($trim);
            $value = strtolower($removeAccent);

            if ($value == 'nao') {
                $value = false;
            } elseif ($value == 'sim') {
                $value = true;
            } else {
                $value = NULL;
            }

            return $value;
        } catch (\Exception $e) {
            return $value;
        } 
    }

    public static function toOnlyDate($value, $createFromFormat = 'd/m/Y', $toFormat = 'Y-m-d')
    {
        if ($value) {
            return Carbon::createFromFormat($createFromFormat, $value)->format($toFormat);
        }

        return $value;
    }
}