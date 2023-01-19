<?php

namespace App\ApiController;

use App\BusinnesController\Common\LoginController;
use App\Dto\Input\UserInputDto;
use App\Http\Response\ApiResponse;

class CreateAccountAction extends BaseAction
{
    private LoginController $loginController;
    
    public function __construct(LoginController $loginController)
    {
        $this->loginController = $loginController;
    }
    
    public function __invoke(UserInputDto $userDto) : ApiResponse
    {
        $userOutputDto = $this->loginController->createAccount($userDto);
        
        return $this->createResponse($userOutputDto, ApiResponse::HTTP_CREATED);
    }
}