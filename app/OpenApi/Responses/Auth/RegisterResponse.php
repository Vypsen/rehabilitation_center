<?php

namespace App\OpenApi\Responses\Auth;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use Vyuldashev\LaravelOpenApi\Factories\ResponseFactory;

class RegisterResponse extends ResponseFactory
{
    public function build(): Response
    {
        return Response::ok()->description('Successful response');
    }
}
