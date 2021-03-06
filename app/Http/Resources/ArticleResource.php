<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'author' => $this->getAuthor(),
            'status' => $this->status,
            'color' => $this->status_color,
            'link' => [
                'show' => route('admin.articles.show', $this),
                'edit' => route('admin.articles.edit', $this),
                'show_author' => $this->getAuthorRoute(),
            ]
        ];
    }
}
