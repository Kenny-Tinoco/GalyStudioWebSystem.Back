<?php

namespace App\Repository;


use App\Entity\UserEntity;
use Doctrine\ORM\Exception\ORMException;

class UserEntities extends BaseRepository
{
    public function create(UserEntity $user) : bool
    {
        try
        {
            $this->create($user);
            return true;
        }
        catch (ORMException $e)
        {
            return false;
        }
    }
    
	public function findByUsername(string $username) : ?UserEntity
	{
        return $this->objectRepository->find(1);
	}
    
    protected static function entityClass(): string
    {
        return UserEntity::class;
    }
}
