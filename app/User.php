<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addProfile(array $data)
    {
        $profile = (new Profile)->fill($data);

        return $this->profile()->save($profile);
    }

    public function createArticle(array $data)
    {
        $article = (new Article)->fill($data);

        $this->articles()->save($article);

        $article->addTags($data['tag_id']);

        return $article;
    }

    public function addComment($data, $article)
    {
        $comment = ((new Comment)->fill($data))
            ->article()->associate($article);

        return $this->comments()->save($comment);
    }

    public function owns($model)
    {
        return $this->id == $model->user_id;
    }

    public function isMe($user)
    {
        return $this->id == $user->id;
    }

    public function isAuthor()
    {
        return collect(['g@gmail.com', 'd@gmail.com'])->contains($this->email);
    }

    public function hasProfile()
    {
        return $this->profile;
    }

    public static function findBy($attribute, $value)
    {
        return static::where($attribute, $value)->firstOrFail();
    }
}
