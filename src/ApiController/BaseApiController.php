<?php

namespace App\ApiController;

use App\Http\Response\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class BaseApiController
{
    public function createResponse(mixed $data, int $status = Response::HTTP_OK) : ApiResponse
    {
        return new ApiResponse($data, $status);
    }
}
