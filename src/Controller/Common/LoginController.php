<?php

namespace App\Controller\Common;

use App\Entity\UserEntity;
use App\Entity\SessionEntity;
use App\Repository\UserEntities;
use Symfony\Component\HttpFoundation\JsonResponse;

class LoginController extends BaseController
{
    private SessionEntity $sessionEntity;
    private UserEntities $userEntities;
    
    public function __construct(SessionEntity $sessionEntity, UserEntities $userEntities)
    {
        $this->sessionEntity = $sessionEntity;
        $this->userEntities = $userEntities;
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

	public function createAccount(UserEntity $user) : JsonResponse
	{
        $this->userEntities->create($user);
        
        return new JsonResponse
        (
            ['result' => true]
        );
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
