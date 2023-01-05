<?php

namespace App\Dto;

class FactoryUserDto
{
    public function getUserDTO(Array $data) : UserDto
    {
        return new UserDto(null, $data);
    }
}
