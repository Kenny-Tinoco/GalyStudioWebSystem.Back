<?php

namespace App\Controller\Common;

use App\Entity\UserEntity;
use App\Repository\UserEntities;
use Symfony\Component\HttpFoundation\JsonResponse;

class LoginController extends BaseController
{

	public function login($userName) : JsonResponse
	{
        
        return new JsonResponse
        (
            ['result' => $userName]
        );
	}

	public function createAccount(UserEntity $user) : bool
	{
        $userEntities = new UserEntities();
        return $userEntities->create($user);
	}
 
	public function isLoggedOut() : JsonResponse
	{
        return new JsonResponse
        (
            ['status' => 'Ok']
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
