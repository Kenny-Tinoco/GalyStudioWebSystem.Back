<?php

namespace App\Controller\Common;

use App\Entity\SessionEntity;
use App\Entity\UserEntities;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends BaseController
{
    private SessionEntity $session;
    
	public function __construct()
	{
        $this->session = new SessionEntity();
	}
    
    #[Route('/login', name: 'login')]
	public function login($user) : bool
	{
        $userEntities = new UserEntities();
        $result = $userEntities->findByUsername($user->username);
        
        if(is_null($user))
            return false;
        
        $this->session->setUser($user);
        return true;
	}

	public function createAccount( $user)
	{
	}
    
    #[Route('/isLoggedOut', name: 'isLoggedOut')]
	public function isLoggedOut() : bool
	{
        return $this->session->isLoggedOut();
	}

	public function changePassword( $user,  $newPassword)
	{
 
	}

}
