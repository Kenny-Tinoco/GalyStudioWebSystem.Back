<?php

namespace App\Dto\Output;

class CreateAccountOutputDto
{
    public readonly string $token;
    
    public function __construct(string $token)
    {
        assert(!empty($token));
        $this->token = $token;
    }
}
