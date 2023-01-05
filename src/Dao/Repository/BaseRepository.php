<?php

namespace App\Dao\Repository;

use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManagerInterface;
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
}
