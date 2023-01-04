<?php

namespace App\ApiResource;

use App\Controller\Common\LoginController;
use App\Dto\FactoryUserDto;
use App\Dto\UserDto;
use App\HTTP\Response\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class LoginResource extends BaseResource
{
    private LoginController $loginController;
    private FactoryUserDto $factoryUserDto;
    
    public function __construct(LoginController $loginController, FactoryUserDto $factoryUserDto)
    {
        $this->loginController = $loginController;
        $this->factoryUserDto = $factoryUserDto;
    }
    
    public function login(Request $request) : JsonResponse
    {
        $data = \json_decode($request->getContent(), true);
    
        $result = $this->loginController->login($data['userName']);
        
        return $this->createResponse( ['result' => $result], ApiResponse::HTTP_OK);
    }
    
    public function createAccount(Request $request) : JsonResponse
    {
        $data = \json_decode($request->getContent(), true);
        
        $dto = $this->factoryUserDto->getUserDTO($data);
        
        $result = $this->loginController->createAccount($dto);
        
        return $this->createResponse( ['result ' => $result], ApiResponse::HTTP_OK);
    }
    
    
    public function changePassword(Request $request) : JsonResponse
    {
        return $this->createResponse( ['result ' => true], ApiResponse::HTTP_OK);
    }
}