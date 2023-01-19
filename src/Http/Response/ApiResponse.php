<?php

namespace App\Http\Response;

use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiResponse extends JsonResponse
{
    protected ContainerBagInterface $container;
    
    public function __construct(mixed $data, int $code = JsonResponse::HTTP_OK)
    {
        parent::__construct($data, $code);
    }
}
