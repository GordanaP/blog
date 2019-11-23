<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ComponentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('components.error', 'formError');
        Blade::component('components.asterisks', 'asterisks');
        Blade::component('components.comment', 'comment');
        Blade::component('components.filters', 'filters');
        Blade::component('components.filter', 'filter');
        Blade::component('components.filter_title', 'filterTitle');
        Blade::component('components.article_rating', 'rating');
        Blade::component('components.button_like', 'buttonLike');
        Blade::component('components.button_dislike', 'buttonDislike');
        Blade::component('components.admin.datatable', 'dataTable');
        Blade::component('components.admin.navitem_sideadmin', 'navitem');
        Blade::component('components.admin.page_header', 'header');
        Blade::component('components.admin.button_view', 'view');
        Blade::component('components.admin.button_view_all', 'viewAll');
        Blade::component('components.admin.button_add_new', 'addNew');
        Blade::component('components.admin.button_edit', 'edit');
        Blade::component('components.admin.button_delete', 'delete');
        Blade::component('components.admin.row_info', 'rowInfo');
    }
}
