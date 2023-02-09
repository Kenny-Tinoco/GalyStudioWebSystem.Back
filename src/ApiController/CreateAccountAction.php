<?php

namespace App\ApiController;

use App\BusinessController\Common\CreateAccountController;
use App\Dto\Input\UserInputDto;
use App\Http\Response\ApiResponse;

class CreateAccountAction extends BaseAction
{
    private CreateAccountController $createAccountController;
    
    public function __construct(CreateAccountController $createAccountController)
    {
        $this->createAccountController = $createAccountController;
    }
    
    public function __invoke(UserInputDto $userDto) : ApiResponse
    {
        $userOutputDto = $this->createAccountController->createAccount($userDto);
        
        return $this->createResponse($userOutputDto, ApiResponse::HTTP_CREATED);
    }
}
