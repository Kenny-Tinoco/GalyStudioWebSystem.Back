<?php

namespace App\Exception;

class EntityNotFoundException extends \DomainException
{
    public function createFromElementAndClass(string $content, string $type, string $class) : self
    {
        $message = 'Entity with '.$type.' ['.$content.'] for class ['.$class.'] not found';
        return new self(\sprintf($message));
    }
}
