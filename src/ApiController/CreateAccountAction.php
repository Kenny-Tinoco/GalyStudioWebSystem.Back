<?php

namespace App\ApiController;

use App\BusinnesController\Common\LoginController;
use App\Dto\Input\UserInputDto;
use App\Http\Response\ApiResponse;

class CreateAccountAction extends BaseAction
{
    public function __invoke(UserInputDto $userDto, LoginController $loginController) : ApiResponse
    {
        $userOutputDto = $loginController->createAccount($userDto);
        
        return $this->createResponse($userOutputDto, ApiResponse::HTTP_CREATED);
    }
}