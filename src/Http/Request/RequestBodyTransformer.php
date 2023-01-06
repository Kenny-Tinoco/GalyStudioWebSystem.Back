<?php

namespace App\Http\Request;

use Symfony\Component\HttpFoundation\InputBag;
use Symfony\Component\HttpFoundation\Request;

class RequestBodyTransformer
{
    public function transform(Request $request): void
    {
        switch ($request->headers->get('Content-Type'))
        {
            case 'application/json':
                $data = \json_decode($request->getContent(), true);
                $request->request = new InputBag($data);
                break;
                
                default:
                break;
        }
    }
}
