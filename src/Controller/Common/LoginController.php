<?php

namespace App\Controller\Common;

use App\Entity\SessionEntity;
use App\Entity\UserEntities;
use App\Entity\UserEntity;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends BaseController
{
    private $session;
    
	public function __construct()
	{
        $this->session = new SessionEntity();
	}
    
    #[Route('/login', name: 'login')]
	public function login( $user)
	{
        $userEntities = new UserEntities();
        $result = $userEntities->findByUsername($user->username);
        
        if($result == null)
            return false;
        
        $this->session->setUser($user);
        return true;
	}

	public function createAccount( $user)
	{
	}

	public function isLoggedOut()
	{
        return $this->session->getUser() == null;
	}

	public function changePassword( $user,  $newPassword)
	{
 
	}

}
