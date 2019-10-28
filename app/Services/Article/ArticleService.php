<?php

namespace App\Services\Article;

use App\Article;
use App\Comment;
use App\Facades\ArticleImageService;

class ArticleService
{
    protected $article;
    protected $user;
    protected $tags = [];
    protected $image = '';

    public function __construct()
    {
        $this->article  = request()->route('article');
        $this->user  = request()->route('user');
        $this->tags = request('tag_id');
        $this->image = request('image');
    }

    public function create($data)
    {
        $article = (new Article)->fill($data);

        $article->addUser($this->user)->addTags($this->tags);

        ArticleImageService::manage($article, $this->image);

        return $article;
    }

    public function update($data)
    {
        tap($this->article)->update($data)->addTags($this->tags);

        ArticleImageService::manage($this->article, $this->image);
    }

    public function remove()
    {
        ArticleImageService::removeFromStorage($this->article->image);

        optional($this->article->image)->delete();

        $this->article->delete();
    }

    public function addComment($data)
    {
        $comment = ((new Comment)->fill($data))
            ->user()->associate($this->user);

       return $this->article->comments()->save($comment);
    }

    public function addRating($rating)
    {
        $this->article->ratings()->attach([
            $rating => ['user_id' => $this->user->id]
        ]);
    }
}