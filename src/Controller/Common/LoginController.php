<?php

namespace App\Controller\Common;

use App\Entity\UserEntity;
use App\Entity\SessionEntity;
use App\HTTP\Response\ApiResponse;
use App\Repository\UserEntities;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends BaseController
{
    private SessionEntity $sessionEntity;
    
    public function __construct(private UserEntities $userEntities)
    {
        $this->userEntities = $userEntities;
        $this->sessionEntity = new SessionEntity();
    }

	public function login($userName) : JsonResponse
    {
        $user = $this->userEntities->findByUsername($userName);
        
        # $this->userEntities->
        
        if(is_null($user))
        {
            return new JsonResponse([ 'result' => 'failed' ]);
        }
        
        $this->sessionEntity->setUser($user);
        
        return new JsonResponse
        (
            ['result' => 'ok']
        );
	}
 

	public function createAccount(Request $request) : JsonResponse
	{
        $data = \json_decode($request->getContent(), true);
        
        $element = new UserEntity($data['userName'], $data['password']);
        
        $user = $this->userEntities->create($element);
        
        return $this->createResponse( ['user' => $user->toArray()], ApiResponse::HTTP_OK);
	}
 
	public function isLoggedOut() : JsonResponse
	{
        return new JsonResponse
        (
            ['status' => $this->sessionEntity->isLoggedOut()]
        );
	}

	public function changePassword(UserEntity $user, string $newPassword) : JsonResponse
	{
        
        return new JsonResponse
        (
            ['result' => 'Todo ok']
        );
	}

}
