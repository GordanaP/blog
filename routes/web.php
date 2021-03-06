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
        Route::resource('users.articles', 'UserArticleController', [
            'parameters' => ['' => 'user']
        ])->only('create');
        Route::get('users/{user}/articles/list', 'UserArticleAjaxController@index')
            ->name('users.articles.list');
    });

/**
 * Admin Profile
 */
Route::middleware('admin')->prefix('admin')->name('admin.')->namespace('Profile')
    ->group(function () {
        Route::get('profiles/list', 'ProfileAjaxController@index')
            ->name('profiles.list');
        Route::delete('profiles/{profile?}', 'ProfileController@destroy')
            ->name('profiles.destroy');
        Route::resource('profiles', 'ProfileController', [
            'parameters' => ['' => 'profile']
        ])->except('destroy');
        Route::resource('profiles.articles', 'ProfileArticleController', [
            'parameters' => ['' => 'profile']
        ])->only('create');
        Route::get('profiles/{profile}/articles/list', 'ProfileArticleAjaxController@index')
            ->name('profiles.articles.list');
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
        Route::resource('categories.articles', 'CategoryArticleController', [
            'parameters' => ['' => 'category']
        ])->only('create');
        Route::get('categories/{category}/articles/list', 'categoryArticleAjaxController@index')
            ->name('categories.articles.list');
    });

/**
 * Admin Role
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
        Route::resource('roles.users', 'RoleUserController', [
            'parameters' => ['' => 'role']
        ])->only('create');
        Route::get('roles/{role}/users/list', 'RoleUserAjaxController@index')
            ->name('roles.users.list');
    });

/**
 * Admin Tag
 */
Route::middleware('admin')->prefix('admin')->name('admin.')->namespace('Tag')
    ->group(function () {
        Route::get('tags/list', 'TagAjaxController@index')
            ->name('tags.list');
        Route::delete('tags/{tag?}', 'TagController@destroy')
            ->name('tags.destroy');
        Route::resource('tags', 'TagController', [
            'parameters' => ['' => 'tag']
        ])->except('destroy');
        Route::resource('tags.articles', 'TagArticleController', [
            'parameters' => ['' => 'tag']
        ])->only('create');
        Route::get('tags/{tag}/articles/list', 'TagArticleAjaxController@index')
            ->name('tags.articles.list');
    });
