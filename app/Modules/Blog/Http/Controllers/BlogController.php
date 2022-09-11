<?php

namespace App\Modules\Blog\Http\Controllers;

use App\Modules\Blog\Entities\Blog;
use App\Modules\Blog\Transformers\BlogResource;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Routing\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Responsable
     */
    public function index()
    {
        return new BlogResource::collection(
            Blog::query()->all()
        );
    }

    /**
     * Show the specified resource.
     * @param string $slug
     * @return Responsable
     */
    public function show($slug)
    {
        return new BlogResource(
            Blog::query()->where('slug', $slug)->firstOrFail()
        );
    }
}
