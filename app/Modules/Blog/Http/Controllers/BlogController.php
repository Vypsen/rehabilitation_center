<?php

namespace App\Modules\Blog\Http\Controllers;

use App\Modules\Blog\Entities\Blog;
use App\Modules\Blog\Transformers\BlogResource;
use App\OpenApi\Responses\Blog\FullBlogResponse;
use App\OpenApi\Responses\Blog\GetPostResponse;
use App\OpenApi\Responses\NotFoundResponses;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Routing\Controller;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;


#[OpenApi\PathItem]
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Responsable
     */
    #[OpenApi\Operation(tags: ['blog'], method: "GET")]
    #[OpenApi\Response(factory: FullBlogResponse::class, statusCode: 200)]
    #[OpenApi\Response(factory: NotFoundResponses::class, statusCode: 404)]
    public function index()
    {
        return BlogResource::collection(
            Blog::query()->paginate(10)
        );
    }

    /**
     * Show the specified resource.
     * @param string $slug
     * @return Responsable
     */
    #[OpenApi\Operation(tags: ['blog'], method: "GET")]
    #[OpenApi\Response(factory: GetPostResponse::class, statusCode: 200)]
    #[OpenApi\Response(factory: NotFoundResponses::class, statusCode: 404)]
    public function show($slug)
    {
        return new BlogResource(
            Blog::query()->where('slug', $slug)->firstOrFail()
        );
    }
}
