<?php

namespace App\Dto;

use App\Entity\UserEntity;

class UserDto
{
    public string $userId;
    
    public string $userName;
    
    public string $password;
    
    public Array $roles;
    
    public function __construct(UserEntity $userEntity)
    {
        $this->userId = $userEntity->getUserId();
        $this->userName = $userEntity->getUserName();
        $this->password = $userEntity->getPassword();
    }
}