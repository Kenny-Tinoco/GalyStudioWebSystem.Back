<?php

namespace App\Exception;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class JsonTransformerExceptionListener
{
    public function onKernelExecption(ExceptionEvent $event) : void
    {
        $exception = $event->getThrowable();
        
        $data =
        [
            'class' => \get_class($exception),
            'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
            'message' => $exception->getMessage()
        ];
        
        if(\in_array($data['class'], $this->getBadRequestException(), true))
        {
            $data['code'] = Response::HTTP_BAD_REQUEST;
        }
        
        if($exception instanceof EntityNotFoundException)
        {
            $data['code'] = Response::HTTP_NOT_FOUND;
        }
        
        $event->setResponse($this->prepareResponse($data));
    }
    
    private function getBadRequestException() : array
    {
        return
        [
            BadRequestHttpException::class
        ];
    }
    
    private function prepareResponse(array $data) : Response
    {
        return new JsonResponse($data, $data['code']);
    }
}
