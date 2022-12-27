<?php

namespace App\Entity;


class UserEntities extends ElementEntities
{

	public function findByUsername(string $username) : UserEntity
	{
        return new UserEntity();
	}

}
