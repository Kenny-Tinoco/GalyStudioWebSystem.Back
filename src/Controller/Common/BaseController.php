<?php

namespace App\Controller\Common;

use App\HTTP\Response\ApiResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class BaseController extends AbstractController
{
    public function createResponse(array $data, int $status = JsonResponse::HTTP_OK) : ApiResponse
    {
        return new ApiResponse($data, $status);
    }
}