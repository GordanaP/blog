<?php

namespace App\Services\Article;

use App\User;
use App\Article;
use App\Comment;
use App\Mail\CommentWasPosted;
use App\Facades\ArticleImageService;
use Illuminate\Support\Facades\Mail;

class ArticleService
{
    private $article;
    private $user;
    private $tags = [];
    private $image = '';

    public function __construct()
    {
        $this->article  = request()->route('article') ?? request('ids');
        $this->user  = request()->route('user') ?? User::find(request('user_id'));
        $this->tags = request('tag_id');
        $this->image = request('image');
    }

    public function create($data)
    {
        $article = $this->new($data);

        $article->addTags($this->tags);

        ArticleImageService::manage($article, $this->image);

        return $article;
    }

    public function update($data)
    {
        tap($this->article)->update($data)
            ->addTags($this->tags);

        ArticleImageService::manage($this->article, $this->image);
    }

    public function remove()
    {
        is_array($this->article) ? $this->deleteMany($this->article)
            : $this->deleteSingle($this->article);
    }

    public function addComment($data)
    {
        $comment = (new Comment($data))
            ->article()->associate($this->article);

       return $this->user->addComment($comment);
    }

    public function addRating($rating)
    {
        $this->article->ratings()->attach([
            $rating => ['user_id' => $this->user->id]
        ]);
    }

    public function notifyAuthorOnANewComment($comment)
    {
        if(! $this->article->user->owns($comment)) {
            $when = now()->addSeconds(15);

            Mail::to($this->article->user)
                ->later($when, new CommentWasPosted($comment, $this->article));
        }
    }

    private function new($data)
    {
        return $this->user->addArticle(new Article($data));
    }

    private function deleteSingle($article)
    {
        if($article->image) {

            ArticleImageService::removeFromStorage($article->image);

            $article->image->delete();
        }

        $this->article->delete();
    }

    private function deleteMany($articles)
    {
        Article::with('image')->findMany($articles)->map(function($article) {
            if($article->image) {
                ArticleImageService::removeFromStorage($article->image);
                $article->image->delete();
            }
        });

        Article::destroy($articles);
    }
}
