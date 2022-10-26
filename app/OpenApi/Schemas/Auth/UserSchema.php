<?php

namespace App\OpenApi\Schemas\Auth;;

use GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract;
use GoldSpecDigital\ObjectOrientedOAS\Objects\AllOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\AnyOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Not;
use GoldSpecDigital\ObjectOrientedOAS\Objects\OneOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Contracts\Reusable;
use Vyuldashev\LaravelOpenApi\Factories\SchemaFactory;

class UserSchema extends SchemaFactory implements Reusable
{
    /**
     * @return AllOf|OneOf|AnyOf|Not|Schema
     */
    public function build(): SchemaContract
    {
        return Schema::object('User')
            ->properties(
                Schema::integer('id')->default(null),
                Schema::string('name')->default(null),
                Schema::string('lastname')->default(null),
                Schema::string('patronymic')->default(null),
                Schema::string('number_phone')->default(null),
                Schema::string('date_of_birth')->format(Schema::FORMAT_DATE)->default(null),
                Schema::string('email')->default(null),
                Schema::string('password')->format(Schema::FORMAT_PASSWORD)->default(null),
            );
    }
}
