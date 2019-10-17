<?php

/**
 * Welcome
 */
Route::view('/', 'welcome');

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
 * UserArticle
 */
Route::resource('users.articles', 'User\UserArticleController')
    ->only('create', 'store');

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

