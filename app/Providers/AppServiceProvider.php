<?php

namespace App\Providers;

use Auth;
use App\Menu;
use App\Setting;
use App\Language;
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
        view()->composer('admin.layout', function($view) {
            $view->with('user', Auth::user());
            // $view->with('g_languages', Language::where('is_public', 1)->get());
        });

        view()->composer('layout', function($view) {
            $view->with('site', Setting::all()->first());
            $view->with('menus', Menu::where('is_public', 1)->get());
        });

        view()->composer('home.index', function($view) {
            $view->with('site', Setting::all()->first());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
