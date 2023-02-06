<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

interface UserEntityInterface extends UserInterface, PasswordAuthenticatedUserInterface
{
}