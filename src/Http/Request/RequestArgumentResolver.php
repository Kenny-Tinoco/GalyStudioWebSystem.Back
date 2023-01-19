<?php

namespace App\Http\Request;

use App\Exception\BadRequestHttpException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RequestArgumentResolver implements ValueResolverInterface
{
    private ValidatorInterface $validator;
    private RequestBodyTransformer $requestBodyTransformer;
    
    public function __construct(ValidatorInterface $validator, RequestBodyTransformer $requestBodyTransformer)
    {
        $this -> validator = $validator;
        $this -> requestBodyTransformer = $requestBodyTransformer;
    }
    
    public function resolve(Request $request, ArgumentMetadata $argument): \Generator
    {
        $class = $argument -> getType();
        $this -> requestBodyTransformer -> transform($request);
        $dto = new $class($request);
        
        $errors = $this -> validator -> validate($dto);
        
        if (\count($errors) > 0)
        {
            throw new BadRequestHttpException();
        }
        
        yield $dto;
    }
}
