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
Route::middleware('admin')->prefix('admin')->name('admin.')->namespace('Article')
    ->group(function () {
        Route::get('articles/list', 'ArticleAjaxController@index')
            ->name('articles.list');
        Route::delete('articles/{article?}', 'ArticleController@destroy')
            ->name('articles.destroy');
        Route::resource('articles', 'ArticleController', [
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
Route::middleware('admin')->prefix('admin')->name('admin.')->namespace('User')
    ->group(function () {
        Route::get('users/list', 'UserAjaxController@index')
            ->name('users.list');
        Route::delete('users/{user?}', 'UserController@destroy')
            ->name('users.destroy');
        Route::resource('users', 'UserController', [
            'parameters' => ['' => 'user']
        ])->except('destroy');
        Route::get('users/{user}/articles', 'UserArticleController@index')
            ->name('users.articles.index');
        Route::get('users/{user}/articles/list', 'UserArticleAjaxController@index')
            ->name('users.articles.list');
    });

/**
 * Admin Category
 */
Route::middleware('admin')->prefix('admin')->name('admin.')->namespace('Category')
    ->group(function () {
        Route::get('categories/list', 'CategoryAjaxController@index')
            ->name('categories.list');
        Route::delete('categories/{category?}', 'CategoryController@destroy')
            ->name('categories.destroy');
        Route::resource('categories', 'CategoryController', [
            'parameters' => ['' => 'category']
        ])->except('destroy');
        Route::get('categories/{category}/articles/create', 'CategoryArticleController@create')
            ->name('categories.articles.create');
        Route::get('categories/{category}/articles/list', 'categoryArticleAjaxController@index')
            ->name('categories.articles.list');
    });

    /**
     * Admin Category
     */
    Route::middleware('admin')->prefix('admin')->name('admin.')->namespace('Role')
        ->group(function () {
            Route::get('roles/list', 'RoleAjaxController@index')
                ->name('roles.list');
            Route::delete('roles/{role?}', 'RoleController@destroy')
                ->name('roles.destroy');
            Route::resource('roles', 'RoleController', [
                'parameters' => ['' => 'Role']
            ])->except('destroy');
            Route::get('roles/{role}/articles/create', 'RoleUserController@create')
                ->name('roles.users.create');
            Route::get('roles/{role}/users/list', 'RoleUserAjaxController@index')
                ->name('roles.users.list');
        });
