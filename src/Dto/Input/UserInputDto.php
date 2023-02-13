<?php

namespace App\Dto\Input;

use App\Http\Request\RequestDto;
use Symfony\Component\HttpFoundation\Request;

class UserInputDto implements RequestDto
{
    private readonly string $userName;
    
    private readonly string $password;
    
    private readonly string $roles;
    
    public function __construct(Request $request)
    {
        assert($request !== null);
        
        $this->userName = $request->request->get("username");
        $this->password = $request->request->get("password");
        $this->roles = $request->request->get("roles");
    }

    public function getUserName() : string
    {
        return $this -> userName;
    }

    public function getPassword() : string
    {
        return $this->password;
    }
    
    public function getRoles() : string
    {
        return $this->roles;
    }
}
