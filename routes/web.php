<?php

Route::get('/', 'Article\ArticleController@index')
    ->name('articles.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('articles', 'Article\ArticleController')
    ->except('index', 'create', 'store');

Route::resource('users.articles', 'User\UserArticleController')
    ->only('create', 'store');
