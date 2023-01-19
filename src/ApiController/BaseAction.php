<?php

namespace App\ApiController;

use App\Http\Response\ApiResponse;
use Symfony\Component\HttpFoundation\Response;

class BaseAction
{
    public function createResponse(mixed $data, int $status = Response::HTTP_OK) : ApiResponse
    {
        return new ApiResponse($data, $status);
    }
}
