<?php

namespace App\OpenApi\Responses\Blog;

use App\OpenApi\Schemas\Blog\PaginatorLinksSchema;
use App\OpenApi\Schemas\Blog\PaginatorMetaSchema;
use App\OpenApi\Schemas\Blog\ShortPostSchema;
use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\ResponseFactory;

class FullBlogResponse extends ResponseFactory
{
    public function build(): Response
    {
        return Response::ok()->description('Successful response')->content(
            MediaType::json()->schema(Schema::object()->properties(
                Schema::array('data')->items(ShortPostSchema::ref()),
                PaginatorLinksSchema::ref('links'),
                PaginatorMetaSchema::ref('meta'),
            ))
        );
    }
}
