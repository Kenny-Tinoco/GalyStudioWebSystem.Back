<?php

namespace App\Utils;

class Contract
{
    public static bool $enabled;
    
    public static function assert(bool $expression, string $class, string $line) : void
    {
        if (!$expression && Contract::$enabled)
        {
            exit("Failed assertion. Class [".$class."], line ".$line);
        }
    }
}
