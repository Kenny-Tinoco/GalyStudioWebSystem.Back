<?php

namespace App\Dao\Repository;

use App\Utils\Contract;
use App\Utils\Utils;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\Persistence\ObjectRepository;

abstract class BaseRepository
{
    protected ObjectRepository $objectRepository;
    private EntityManagerInterface $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager, public Connection $connection)
    {
        $this->entityManager = $entityManager;
        $this->objectRepository = $this->getEntityManager()->getRepository($this->entityClass());
    }
    
    protected function getEntityManager() : EntityManagerInterface
    {
        return $this->entityManager;
    }
    
    abstract protected static function entityClass() : string;
    
    protected function saveEntity(object $entity) : void
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }
    
    protected function removeEntity(object $entity) : void
    {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }
    
    /**
     * @throws NoResultException
     */
    
    protected function getOneResult(AbstractQuery $query)
    {
        try
        {
            $result = $query -> getOneOrNullResult();
            
            if(is_null($result))
            {
                throw new NonUniqueResultException();
            }
        }
        catch (NonUniqueResultException $e)
        {
            throw new NoResultException();
        }
        
        return $result;
    }
}
