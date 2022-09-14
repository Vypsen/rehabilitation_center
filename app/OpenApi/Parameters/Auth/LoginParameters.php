<?php

namespace App\OpenApi\Parameters\Auth;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\ParametersFactory;

class LoginParameters extends ParametersFactory
{
    /**
     * @return Parameter[]
     */
    public function build(): array
    {
        return [
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
