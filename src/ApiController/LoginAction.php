<?php

namespace App\ApiController;

use App\BusinnesController\Common\LoginController;
use App\Dto\Input\UserLoginDto;
use App\Http\Response\ApiResponse;

class LoginAction extends BaseAction
{
    public function __invoke(UserLoginDto $userDto, LoginController $loginController) : ApiResponse
    {
        $userOutputDto = $loginController->login($userDto);
        
        return $this->createResponse($userOutputDto, ApiResponse::HTTP_ACCEPTED);
    }
}
