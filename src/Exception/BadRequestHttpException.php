<?php

namespace App\Exception;

class BadRequestHttpException extends \DomainException
{
    public function create(string $message) : self
    {
        return new self($message);
    }
}
