<?php

namespace App\ApiController;

use App\BusinnesController\Common\LoginController;
use App\Dto\Input\UserLoginDto;
use App\Http\Response\ApiResponse;

class LoginAction extends BaseAction
{
    private LoginController $loginController;
    
    public function __construct(LoginController $loginController)
    {
        $this->loginController = $loginController;
    }
    
    public function __invoke(UserLoginDto $userDto) : ApiResponse
    {
        $userOutputDto = $this->loginController->login($userDto);
        
        return $this->createResponse($userOutputDto, ApiResponse::HTTP_ACCEPTED);
    }
}
