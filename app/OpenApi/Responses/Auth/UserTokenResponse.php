<?php

namespace App\OpenApi\Responses\Auth;

use App\OpenApi\Schemas\Auth\UserSchema;
use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Contracts\Reusable;
use Vyuldashev\LaravelOpenApi\Factories\ResponseFactory;

class UserTokenResponse extends ResponseFactory implements Reusable
{
    public function build(): Response
    {

        return Response::ok()->description('Successful response')->content(
            MediaType::json()->schema(Schema::object()->
            properties(
                UserSchema::ref('user'),
                Schema::string('token'),
            )),
        );

    }
}
