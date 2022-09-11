<?php

namespace App\Modules\Blog\Transformers;

use App\Modules\Blog\Entities\Blog;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Blog
 */
class BlogResource extends JsonResource
{

    /**
     * Transform the resource collection into an array.
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'text' => $this->text,
            'slug' => $this->slug,
        ];
    }
}
