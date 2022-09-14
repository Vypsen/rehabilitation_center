<?php

namespace App\OpenApi\Schemas\Blog;

use GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Contracts\Reusable;
use Vyuldashev\LaravelOpenApi\Factories\SchemaFactory;

class PaginatorMetaSchema extends SchemaFactory implements Reusable
{
    public function build(): SchemaContract
    {
        return Schema::object('PaginatorMeta')
            ->properties(
                Schema::integer('current_page')->default(null),
                Schema::integer('from')->default(null),
                Schema::integer('last_page')->default(null),
                Schema::array('links')->items(
                    Schema::object()->properties(
                        Schema::string('url')->default(null),
                        Schema::string('label')->default(null),
                        Schema::string('active')->default(null),
                    )
                ),
                Schema::string('path')->default(null),
                Schema::integer('per_page')->default(null),
                Schema::integer('to')->default(null),
                Schema::integer('total')->default(null),
            );
    }
}
