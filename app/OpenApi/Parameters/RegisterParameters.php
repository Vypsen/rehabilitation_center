<?php

namespace App\OpenApi\Parameters;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\ParametersFactory;

class RegisterParameters extends ParametersFactory
{
    /**
     * @return Parameter[]
     */
    public function build(): array
    {
        return [
            Parameter::query()
                ->name('name')
                ->description('user name')
                ->required(true)
                ->schema(Schema::string())
                ->example("user"),

            Parameter::query()
                ->name('email')
                ->description('email user')
                ->required(true)
                ->schema(Schema::string())
                ->example("user@gmail.com"),

            Parameter::query()
                ->name('password')
                ->description('password user')
                ->required(true)
                ->schema(Schema::string('12345678qwerty')),
        ];
    }
}
