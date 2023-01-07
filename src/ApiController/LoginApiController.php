<?php

namespace App\ApiController;

use App\BusinnesController\Common\LoginController;
use App\Dto\Input\UserInputDto;
use App\Http\Response\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LoginApiController extends BaseApiController
{
    private LoginController $loginController;
    
    public function __construct(LoginController $loginController, ApiResponse $ApiResponse)
    {
        parent::__construct($ApiResponse);
        
        $this->loginController = $loginController;
    }
    
    public function login(UserInputDto $userDto) : JsonResponse
    {
        $userOutputDto = $this->loginController->login($userDto->userName);
        
        return $this->createResponse($userOutputDto, Response::HTTP_ACCEPTED);
    }
    
    public function createAccount(UserInputDto $userDto) : JsonResponse
    {
        $userOutputDto = $this->loginController->createAccount($userDto);
        
        return $this->createResponse($userOutputDto, Response::HTTP_CREATED);
    }
}
