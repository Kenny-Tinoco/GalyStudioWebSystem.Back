<?php

namespace App\Controller\Common;

use App\Entity\SessionEntity;
use App\Entity\UserEntities;
use App\Entity\UserEntity;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends BaseController
{
    private SessionEntity $session;
    
	public function __construct()
	{
        $this->session = new SessionEntity();
	}
    
    #[Route('/login', name: 'login')]
	public function login(UserEntity $user) : bool
	{
        $userEntities = new UserEntities();
        $result = $userEntities->findByUsername($user->getUsername());
        
        $this->session->setUser($result);
        
        return true;
	}

	public function createAccount(UserEntity $user) : bool
	{
        return true;
	}
    
    #[Route('/isLoggedOut', name: 'isLoggedOut')]
	public function isLoggedOut() : bool
	{
        return $this->session->isLoggedOut();
	}

	public function changePassword(UserEntity $user, string $newPassword) : void
	{
 
	}

}
