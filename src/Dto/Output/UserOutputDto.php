<?php

namespace App\Dto\Output;

use App\Entity\UserEntity;

class UserOutputDto
{
    public readonly string $userId;
    
    public readonly string $userName;
    
    private function __construct(string $userId, $userName)
    {
        $this->userId = $userId;
        $this->userName = $userName;
    }
    
    public static function create(UserEntity $userEntity) : self
    {
        return new self($userEntity->getUserId(), $userEntity->getUserName());
    }
}