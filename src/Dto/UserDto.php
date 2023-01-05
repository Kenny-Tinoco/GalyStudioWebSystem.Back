<?php

namespace App\Dto;

use App\Entity\UserEntity;

class UserDto
{
    public readonly string $userId;
    
    public readonly string $userName;
    
    public readonly string $password;
    
    public readonly array $roles;
    
    public function createFromUserEntity(UserEntity $userEntity): void
    {
        $this->userId = $userEntity->getUserId();
        $this->userName = $userEntity->getUserName();
        $this->password = $userEntity->getPassword();
    }
    
    public function createFromArray(Array $data): void
    {
        $this->userId = $data["userId"];
        $this->userName = $data["userName"];
        $this->password = $data["password"];
    }
}
