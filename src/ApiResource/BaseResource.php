<?php

namespace App\ApiResource;

use App\HTTP\Response\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

class BaseResource
{
    public function createResponse(array $data, int $status = JsonResponse::HTTP_OK) : ApiResponse
    {
        return new ApiResponse($data, $status);
    }
}
