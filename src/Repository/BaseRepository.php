<?php

namespace App\Repository;

use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ObjectRepository;

abstract class BaseRepository
{
    protected ObjectRepository $objectRepository;
    protected ManagerRegistry $managerRegistry;
    
    public function __construct(ManagerRegistry $managerRegistry, public Connection $connection)
    {
        $this->managerRegistry = $managerRegistry;
        $this->objectRepository = $this->getEntityManager()->getRepository($this->entityClass());
    }
    
    protected function getEntityManager(): EntityManager | ObjectManager
    {
        $entityManager = $this->managerRegistry->getManager();
        
        if ($entityManager->isOpen()) {
            return $entityManager;
        }
        
        return $this->managerRegistry->resetManager();
    }
    
    abstract protected static function entityClass(): string;
    
    protected function saveEntity(object $entity): void
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }
    
    protected function removeEntity(object $entity): void
    {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }
}