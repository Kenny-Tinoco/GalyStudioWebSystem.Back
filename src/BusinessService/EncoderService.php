<?php

namespace App\BusinessService;

use App\Entity\UserEntity;
use App\Entity\UserEntityInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class EncoderService implements EncoderServiceInterface
{
    private UserPasswordHasherInterface $userPasswordHasher;
    
    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }
    
    public function generateEncodedPassword(UserEntityInterface $user, string $password): string
    {
        return $this->userPasswordHasher->hashPassword($user, $password);
    }
    
    public function isPasswordValid(UserEntityInterface $user, string $password): bool
    {
        return $this->userPasswordHasher->isPasswordValid($user, $password);
    }
    
    public function encodeUserPassword(UserEntity $user) : void
    {
        $hashedPassword = $this->generateEncodedPassword($user, $user->getPlaintextPassword());
        $user->setPassword($hashedPassword);
    }
}
