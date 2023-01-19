<?php

namespace App\Dao\Repository;

use App\Entity\UserEntity;
use App\Exception\EntityNotFoundException;
use Doctrine\ORM\NoResultException;

class UserRepository extends BaseRepository
{
    public function create(UserEntity $user) : void
    {
        $this->saveEntity($user);
    }
    
	public function findByUsername(string $userName) : UserEntity
	{
        $queryString = 'SELECT u FROM App\Entity\UserEntity u WHERE u.userName = :userName';
        $query = $this->getEntityManager()->createQuery($queryString);
        $query->setParameter('userName', $userName);
        
        try
        {
            $user = $this->getOneResult($query);
        }
        catch (NoResultException $e)
        {
            throw (new EntityNotFoundException())->createFromElementAndClass($userName, "userName", UserEntity::class);
        }
        
        return $user;
    }
    
    protected static function entityClass(): string
    {
        return UserEntity::class;
    }
}
