<?php

namespace App\OpenApi\Responses\Auth;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use Vyuldashev\LaravelOpenApi\Factories\ResponseFactory;

class LogoutUserResponse extends ResponseFactory
{
    public function build(): Response
    {
        return Response::ok()->description('Successful logout');
    }
}
