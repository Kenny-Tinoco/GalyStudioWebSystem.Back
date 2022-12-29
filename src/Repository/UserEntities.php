<?php

namespace App\Repository;


use App\Entity\UserEntity;

class UserEntities
{
    public function create(UserEntity $user) : bool
    {
        return true;
    }
    
	public function findByUsername(string $username) : UserEntity
	{
        return new UserEntity();
	}

}
