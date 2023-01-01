<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class RoleEntity
{
   private int $roleId;
   
   private string $name;
   
   private string $description;
   
   private Collection $users;
   
   
   public function __construct()
   {
       $this->roleId = 0;
       $this->name = "";
       $this->description = "";
       $this->users = new ArrayCollection();
   }
    
    public function getRoleId(): int
    {
        return $this -> roleId;
    }
    
    public function getName(): string
    {
        return $this -> name;
    }
    
    public function getDescription(): string
    {
        return $this -> description;
    }
    
    public function getUsers(): ArrayCollection|Collection
    {
        return $this -> users;
    }
    
}