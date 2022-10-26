<?php

namespace App\OpenApi\Parameters\Auth;

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
                ->name('lastname')
                ->description('user lastname')
                ->required(true)
                ->schema(Schema::string())
                ->example("lastname"),

            Parameter::query()
                ->name('patronymic')
                ->description('user patronymic')
                ->required(true)
                ->schema(Schema::string())
                ->example("patronymic"),

            Parameter::query()
                ->name('number_phone')
                ->description('user number_phone')
                ->required(true)
                ->schema(Schema::string())
                ->example("number_phone"),

            Parameter::query()
                ->name('date_of_birth')
                ->description('user date_of_birth')
                ->required(true)
                ->schema(Schema::string('number_phone')->format(Schema::FORMAT_DATE))
                ->example("20.04.2001"),

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
                ->schema(Schema::string('12345678qwerty')->format(Schema::FORMAT_PASSWORD)),
        ];
    }
}
