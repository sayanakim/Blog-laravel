<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // подключаем пагинацию
        Paginator::useBootstrap();
        $this->activeLinks();
    }

    // второй способ активной ссылки

    public function activeLinks()
    {
        View::composer('layouts.app', function ($view) {
            $view->with('mainLink', request()->is('/') ? 'menu-link__active' : '');
            $view->with('articleLink', (request()->is('articles') or request()->is('articles/*')) ? 'menu-link__active' : '');
        });
    }
}
