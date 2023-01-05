<?php

namespace App\DTO;

class UserDto
{
    public readonly string $userId;
    
    public readonly string $userName;
    
    public readonly string $password;
    
    public readonly array $roles;
    
    public function __construct(array $data)
    {
        $this->userId = $data["userId"];
        $this->userName = $data["userName"];
        $this->password = $data["password"];
        $this->roles = [];
    }
}
