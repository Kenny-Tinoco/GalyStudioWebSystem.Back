<?php

namespace App\Utils;

class Contract
{
    public static bool $enabled;
    
    public static function assert(bool $expression) : void
    {
        if(!$expression && Contract::$enabled)
        {
            exit("Assertion failed");
        }
    }
}