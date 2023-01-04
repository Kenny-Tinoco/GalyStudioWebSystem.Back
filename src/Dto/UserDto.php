<?php

namespace App\Dto;

use App\Entity\UserEntity;

class UserDto
{
    public string $userId;
    
    public string $userName;
    
    public string $password;
    
    public array $roles;
    
    
    public function __construct(UserEntity $userEntity = null, Array $data = null )
    {
        if((is_null($userEntity) && is_null($data)) || (!is_null($userEntity) && !is_null($data)))
        {
            return;
        }
        
        if(!is_null($userEntity))
        {
            $this->createFromUserEntity($userEntity);
        }
        
        if(!is_null($data))
        {
            $this->createFromArray($data);
        }
        
    }
    
    private function createFromUserEntity(UserEntity $userEntity): void
    {
        $this->userId = $userEntity->getUserId();
        $this->userName = $userEntity->getUserName();
        $this->password = $userEntity->getPassword();
    }
    
    private function createFromArray(Array $data): void
    {
        $this->userId = $data["userId"];
        $this->userName = $data["userName"];
        $this->password = $data["password"];
    }
}