<?php

namespace App\Security\Core\User;

use App\Dao\Repository\UserRepository;
use App\Entity\UserEntity;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class UserProvider implements UserProviderInterface, PasswordUpgraderInterface
{
    private UserRepository $userRepository;
    
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
    }
    
    public function refreshUser(UserInterface $user) : UserInterface
    {
        return $this->loadUserByIdentifier($user->getUserIdentifier());
    }
    
    public function supportsClass(string $class) : bool
    {
        return UserEntity::class === $class;
    }
    
    public function loadUserByIdentifier(string $userName): UserInterface
    {
        try
        {
            return $this->userRepository->findByUsername($userName);
        }
        catch (NotFoundHttpException)
        {
            throw new UnsupportedUserException(\sprintf('User with username %s not found', $userName));
        }
    }
}
