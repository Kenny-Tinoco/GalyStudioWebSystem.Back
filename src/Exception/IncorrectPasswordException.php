<?php

namespace App\Exception;

class IncorrectPasswordException extends \DomainException
{
    public function create(string $username) : self
    {
        $message = 'Incorrect password of the user ['.$username.']';
        return new self(\sprintf($message));
    }
}
