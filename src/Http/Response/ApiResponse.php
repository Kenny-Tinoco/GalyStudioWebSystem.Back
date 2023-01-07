<?php

namespace App\Http\Response;

use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiResponse
{
    protected ContainerBagInterface $container;
    
    public function __construct(ContainerBagInterface $container)
    {
        $this->container = $container;
    }
    
    public function create(array $data, int $status = JsonResponse::HTTP_OK) : JsonResponse
    {
        return new JsonResponse($data, $status);
    }
    
    public function createMixed(mixed $data, int $status = JsonResponse::HTTP_OK) : JsonResponse
    {
        if ($this->container->has('serializer'))
        {
            $json = $this->container->get('serializer')->serialize($data, 'json', array_merge([
                'json_encode_options' => JsonResponse::DEFAULT_ENCODING_OPTIONS,
            ]));
        
            return new JsonResponse($json, $status);
        }
        return $this->create(["Fail"], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
    }
}
