<?php

namespace App\Dto\Input;

use App\Http\Request\RequestDto;
use Symfony\Component\HttpFoundation\Request;

class UserLoginDto implements RequestDto
{
    private readonly string $userName;
    
    private readonly string $password;
    
    public function __construct(Request $request)
    {
        assert($request !== null);
        
        $this->userName = $request->request->get("userName");
        $this->password = $request->request->get("password");
    }
    
    public function getUserName() : string
    {
        return $this->userName;
    }
    
    public function getPassword() : string
    {
        return $this->password;
    }
}
