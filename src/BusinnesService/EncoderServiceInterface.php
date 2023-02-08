<?php

namespace App\BusinnesService;

use App\Entity\UserEntityInterface;

interface EncoderServiceInterface
{
    public function generateEncodedPassword(UserEntityInterface $user, string $password) : string;
    
    public function isPasswordValid(UserEntityInterface $user, string $password) : bool;
    
    public function encodeUserPassword(UserEntityInterface $user) : void;
}