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
}