<?php

namespace App;

use App\Traits\User\HasRole;
use App\Facades\ArticleImageService;
use App\Facades\ProfileImageService;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasRole, Notifiable;

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

        $this->profile()->save($profile);

        ProfileImageService::manage($profile, request('avatar'));

        return $profile;
    }

    public function owns($model)
    {
        return $this->id == $model->user_id;
    }

    public function hasProfile()
    {
        return $this->profile;
    }

    public static function allExceptTheArticleAuthor($article)
    {
        return static::all()->filter(function($user, $key__) use ($article) {
            return ! $user->owns($article);
        });
    }

    public function memberCanSeeOnlyPublished($article)
    {
        return ! $this->owns($article) ? $article->is_published : $article;
    }
}
