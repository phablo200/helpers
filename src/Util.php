<?php

namespace Phablo\Helpers;

class Util {
    
    public static function toPercent($_value, $_total)
    {
        if (intval($_total) === 0 && intval($_value) === 0) {
            return 100;
        }

        if (intval($_total) === 0 && intval($_value) > 0) {
            return 110;
        }

        $_total = $_total == 0 ? 1 : $_total;
        
        return round((($_value * 100) / $_total));
    }

    public static function toThreeRule($_value, $_total)
    {
        return round($_value / $_total, 6);
    }

    public static function removeAccent($value)
    {
        return preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(ç|Ç)/"), explode(" ", "a A e E i I o O u U n N c C"), $value);
    }

    public static function onlyNumber($value)
    {
        return preg_replace('/[^0-9]/', '', $value);
    }

    public static function onlyFloat($value) 
    {
        return preg_replace('/[^0-9,.]/', '', $value);
    }

    public static function onlyChar($value) {
        return preg_replace('/[\d]/', '', $value);
    }

    public static function concat($prefix = ' - ', ...$words)
    {
        if (count($words)) {
            return implode($prefix, $words);
        }

        return NULL;
    }

    public static function mask($mask, $string)
    {
        try {
            $string = str_replace(' ', '', $string);
            for ($i = 0; $i < strlen($string); $i++) {
                $mask[strpos($mask, "#")] = $string[$i];
            }

            return $mask;
        } catch (\Exception $e) {
            return $string;
        }
    }
}