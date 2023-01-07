<?php

namespace App\Dto\Input;

use App\Http\Request\RequestDto;
use Symfony\Component\HttpFoundation\Request;

class UserInputDto implements RequestDto
{
    public readonly string $userId;
    
    public readonly string $userName;
    
    public function __construct(Request $request)
    {
        $this->userId = $request->request->get("userId");
        $this->userName = $request->request->get("userName");
    }
}
