<?php

namespace App\Repository;


use App\Entity\UserEntity;

class UserEntities extends BaseRepository
{
    public function create(UserEntity $user) : void
    {
        $this->saveEntity($user);
    }
    
	public function findByUsername(string $username) : ?UserEntity
	{
        $query = $this->getEntityManager()->createQuery('SELECT u FROM App\Entity\UserEntity u WHERE u.userName = :userName');
        $query->setParameter('userName', $username);
        
        return $query->getOneOrNullResult();
	}
    
    protected static function entityClass(): string
    {
        return UserEntity::class;
    }
}
