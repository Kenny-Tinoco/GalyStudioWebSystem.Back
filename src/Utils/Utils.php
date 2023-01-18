<?php

namespace App\Utils;

class Utils
{
    public static function isValid(mixed $parameter) : bool
    {
        if(empty($parameter))
        {
            return false;
        }
        
        return true;
    }
}