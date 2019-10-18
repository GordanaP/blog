<?php

/**
 * Welcome
 */
Route::view('/', 'welcome');
// Route::get('/', function(){

//     return App\Article::published()->newest()->get()->groupBy(function($article){
//         if($article->publish_at->isCurrentMonth())
//         {
//             return 'this month';
//         }

//         if($article->publish_at->isLastMonth())
//         {
//             return 'last month';
//         }

//         return 'older';
//     });
// });

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

