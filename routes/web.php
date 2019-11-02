<?php

/**
 * Welcome
 */
Route::view('/', 'welcome');

/**
 * Preview Email
 */
Route::get('mailable', function () {
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
    ->except('create', 'store');

/**
 * Comment
 */
Route::resource('comments', 'Article\ArticleController')
    ->only('edit', 'update', 'destroy');

/**
 * UserArticle
 */
Route::resource('users.articles', 'User\UserArticleController')
    ->only('index', 'create', 'store');

/**
 * Profile
 */
Route::resource('profiles', 'Profile\ProfileController')
    ->except('index', 'create', 'store');

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
