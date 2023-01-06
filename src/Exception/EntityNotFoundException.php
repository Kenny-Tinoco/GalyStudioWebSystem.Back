<?php

namespace App\Exception;

class EntityNotFoundException extends \DomainException
{
    public function createFromIdAndClass(string $id, string $class) : self
    {
        $message = 'Entity with id ['.$id.'] for class ['.$class.'] not found';
        return new self(\sprintf($message));
    }
}
