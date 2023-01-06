<?php

namespace App\Dto;

use App\Http\Request\RequestDto;
use Symfony\Component\HttpFoundation\Request;

class UserDto implements RequestDto
{
    public readonly string $userId;
    
    public readonly string $userName;
    
    public readonly string $password;
    
    public readonly array $roles;
    
    public function __construct(Request $request)
    {
        $this->userId = $request->request->get("userId");
        $this->userName = $request->request->get("userName");
        $this->password = $request->request->get("password");
        $this->roles = [];
    }
}
