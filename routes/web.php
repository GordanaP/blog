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
Route::delete('articles/{article?}', 'Article\ArticleController@destroy')
->name('articles.destroy');
Route::resource('articles', 'Article\ArticleController')
->except('destroy');

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
 * Admin
 */
Route::middleware('admin')->prefix('admin')
    ->group(function () {
        Route::get('/articles', 'Article\ArticleController@index')
            ->name('admin.articles.index');
        Route::get('/users', 'User\UserController@index')
            ->name('admin.users.index');
        Route::get('/articles/list', 'Article\ArticleAjaxController');
        Route::get('/users/list', 'User\UserAjaxController');
    });
