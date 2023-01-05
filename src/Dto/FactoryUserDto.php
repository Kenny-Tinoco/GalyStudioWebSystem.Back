<?php

namespace App\Dto;

class FactoryUserDto
{
    public function getUserDTO(array $data) : UserDto
    {
        return new UserDto($data);
    }
}
