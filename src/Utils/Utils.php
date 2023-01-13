<?php

namespace App\Utils;

class Utils
{
    public static function isValid(string $parameter) : bool
    {
        if(is_null($parameter) || empty($parameter))
        {
            return false;
        }
        
        return true;
    }
}