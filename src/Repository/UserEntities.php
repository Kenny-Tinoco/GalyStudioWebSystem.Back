<?php

namespace App\Repository;


use App\Entity\UserEntity;

class UserEntities extends BaseRepository
{
    public function create(UserEntity $user) : UserEntity
    {
        $this->saveEntity($user);
        
        return $user;
    }
    
	public function findByUsername(string $username) : ?UserEntity
	{
        $queryString = 'SELECT u FROM App\Entity\UserEntity u WHERE u.userName = :userName';
        $query = $this->getEntityManager()->createQuery($queryString);
        $query->setParameter('userName', $username);
        
        return $query->getOneOrNullResult();
	}
    
    protected static function entityClass(): string
    {
        return UserEntity::class;
    }
}
