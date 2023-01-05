<?php

namespace App\DTO;

class FactoryUserDto
{
    public function getUserDTO(array $data) : UserDto
    {
        return new UserDto($data);
    }
}
