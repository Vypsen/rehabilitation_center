<?php

namespace App\OpenApi\Responses\Auth;

use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Contracts\Reusable;
use Vyuldashev\LaravelOpenApi\Factories\ResponseFactory;

class LoginResponse extends ResponseFactory implements Reusable
{
    public function build(): Response
    {
        $response = Schema::object()->example(['token' => 'token_string']);

        return Response::create('UserToken')
            ->description('User Token')
            ->content(
                MediaType::json()->schema($response)
            );
    }
}
