<?php

namespace App\ApiController;

use App\Http\Response\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

class BaseApiController
{
    public function createResponse(array $data, int $status = JsonResponse::HTTP_OK) : ApiResponse
    {
        return new ApiResponse($data, $status);
    }
}
