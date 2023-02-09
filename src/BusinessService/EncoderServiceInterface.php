<?php

namespace App\BusinessService;

use App\Entity\UserEntity;
use App\Entity\UserEntityInterface;

interface EncoderServiceInterface
{
    public function generateEncodedPassword(UserEntityInterface $user, string $password) : string;
    
    public function isPasswordValid(UserEntityInterface $user, string $password) : bool;
    
    public function encodeUserPassword(UserEntity $user) : void;
}
