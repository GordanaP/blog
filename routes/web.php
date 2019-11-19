<?php

/**
 * Welcome
 */
Route::view('/', 'welcome')->name('welcome');

/**
 * Admin Dashboard
 */
Route::view('/dashboard', 'admin.index')
    ->name('admin.index')
    ->middleware('admin');

/**
 * Preview Email
 */
Route::get('/mailable', function () {
    //
});

/**
 * Auth
 */
Auth::routes();

/**
 * Home
 */
Route::get('/home', 'HomeController@index')->name('home');

/**
 * Article
 */
Route::resource('articles', 'Article\ArticleController')
    ->only('index');

Route::resource('articles', 'Article\ArticleController')
    ->only('show')
    ->middleware('published.only');

Route::resource('articles', 'Article\ArticleController')
    ->only('edit', 'update', 'destroy')
    ->middleware('author');

/**
 * Admin Article
 */
Route::middleware('admin')->prefix('admin/articles')->name('admin.articles.')->namespace('Article')
    ->group(function () {
        Route::get('list', 'ArticleAjaxController@index')
            ->name('list');
        Route::delete('{article?}', 'ArticleController@destroy')
            ->name('destroy');
        Route::resource('/', 'ArticleController', [
            'parameters' => ['' => 'article']
        ])->except('destroy');
    });

/**
 * Comment
 */
Route::resource('comments', 'Comment\CommentController')
    ->only('edit', 'update', 'destroy');

/**
 * User
 */
Route::resource('users', 'User\UserController')
    ->only('edit', 'update', 'destroy');

/**
 * Profile
 */
Route::resource('profiles', 'Profile\ProfileController')
    ->except('index', 'create', 'store');

/**
 * UserArticle
 */
Route::resource('users.articles', 'User\UserArticleController')
    ->only('index', 'create', 'store')
    ->middleware('author');

/**
 * UserProfile
 */
Route::resource('users.profiles', 'User\UserProfileController')
    ->only('create', 'store');

/**
 * UserArticleComment
 */
Route::resource('users.articles.comments', 'User\UserArticleCommentController')
    ->only('store');

/**
 * UserArticleRating
 */
Route::resource('users.articles.ratings', 'User\UserArticleRatingController')
    ->only('store');

/**
 * UserCommentLike
 */
Route::resource('users.comments.likes', 'User\UserCommentLikeController')
    ->only('store');

/**
 * UserArticleLike
 */
Route::resource('users.articles.likes', 'User\UserArticleLikeController')
    ->only('store');

/**
 * Admin User
 */
Route::middleware('admin')->prefix('admin/users')->name('admin.users.')->namespace('User')
    ->group(function () {
        Route::get('list', 'UserAjaxController@index')
            ->name('list');
        Route::delete('{user?}', 'UserController@destroy')
            ->name('destroy');
        Route::resource('/', 'UserController', [
            'parameters' => ['' => 'user']
        ])->except('destroy');
        Route::get('{user}/articles', 'UserArticleController@index')
            ->name('articles.index');
        Route::get('{user}/articles/list', 'UserArticleAjaxController@index')
            ->name('articles.list');
    });