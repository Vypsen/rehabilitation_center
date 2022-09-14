<?php

namespace App\OpenApi\Schemas\Blog;

use GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Contracts\Reusable;
use Vyuldashev\LaravelOpenApi\Factories\SchemaFactory;

class PaginatorLinksSchema extends SchemaFactory implements Reusable
{
    public function build(): SchemaContract
    {
        return Schema::object('PaginatorLinks')
            ->properties(
                Schema::string('first')->default(null),
                Schema::string('last')->default(null),
                Schema::string('prev')->default(null),
                Schema::string('next')->default(null),
            );
    }
}
