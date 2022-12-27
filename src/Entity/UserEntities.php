<?php

namespace App\Entity;

class UserEntities extends ElementEntities
{

	public function findByUsername($username)
	{
        return new UserEntity();
	}

}
