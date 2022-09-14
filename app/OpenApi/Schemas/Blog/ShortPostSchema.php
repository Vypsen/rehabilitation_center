<?php

namespace App\OpenApi\Schemas\Blog;

use GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Contracts\Reusable;
use Vyuldashev\LaravelOpenApi\Factories\SchemaFactory;

class ShortPostSchema extends SchemaFactory implements Reusable
{
    public function build(): SchemaContract
    {
        return Schema::object('Post')
            ->properties(
                Schema::string('title')->default(null),
                Schema::string('slug')->default(null),
                Schema::string('text')->default(null),
                Schema::string('created_at')->default(null),
            );
    }
}
