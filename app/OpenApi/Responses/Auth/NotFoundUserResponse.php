<?php

namespace App\OpenApi\Responses\Auth;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use Vyuldashev\LaravelOpenApi\Factories\ResponseFactory;

class NotFoundUserResponse extends ResponseFactory
{
    public function build(): Response
    {
        return Response::unauthorized()->description('Unauthorized');
    }
}
