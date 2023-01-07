<?php

namespace App\ApiController;

use App\Http\Response\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class BaseApiController
{
    private ApiResponse $apiResponse;
    
    public function __construct(ApiResponse $apiResponse)
    {
        $this->apiResponse = $apiResponse;
    }
    
    public function createResponse(mixed $data, int $status = Response::HTTP_OK) : JsonResponse
    {
        return $this->apiResponse->createMixed($data, $status);
    }
}
