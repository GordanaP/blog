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
Route::resource('articles', 'Article\ArticleController');

/**
 * Comment
 */
Route::resource('comments', 'Comment\CommentController')
    ->only('edit', 'update', 'destroy');

/**
 * User
 */
Route::delete('users/{user?}', 'User\UserController@destroy')
    ->name('users.destroy');
Route::resource('users', 'User\UserController')
    ->except('destroy');

/**
 * Profile
 */
Route::resource('profiles', 'Profile\ProfileController')
->except('index', 'create', 'store');

/**
 * UserArticle
 */
Route::resource('users.articles', 'User\UserArticleController')
    ->only('index', 'create', 'store');

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
 * Admin Article
 */
Route::middleware('admin')->name('admin.')->namespace('Article')
    ->group(function () {
        Route::get('admin/articles/list', 'ArticleAjaxController@index')
            ->name('articles.list');
        Route::delete('admin/articles/{article?}', 'ArticleController@destroy')
            ->name('articles.destroy');
        Route::resource('admin/articles', 'ArticleController')
            ->except('destroy');
    });

/**
 * Admin User
 */
Route::middleware('admin')->prefix('admin')->namespace('User')
    ->group(function () {
        Route::get('/users', 'UserController@index')
            ->name('admin.users.index');
        Route::get('/users/list', 'UserAjaxController@index');
        Route::get('/users/{user}/articles', 'UserArticleController@index')
            ->name('admin.users.articles.index');
        Route::get('/users/{user}/articles/list', 'UserArticleAjaxController@index');
    });