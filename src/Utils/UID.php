<?php

namespace App\Utils;

use Symfony\Component\Uid\Uuid;

class UID
{
    final public static function generateId() : string
    {
        return Uuid::v4()->toRfc4122();
    }
}
