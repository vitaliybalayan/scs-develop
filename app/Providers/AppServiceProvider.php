<?php

namespace App\Providers;

use Auth;
use App\Menu;
use App\Setting;
use App\Language;
use App\Location;
use App\Service;
use App\Certificate;
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
        });

        view()->composer('layout', function($view) {
            $view->with('site', Setting::all()->first());
            $view->with('menus', Menu::where('is_public', 1)->orderBy('position', 'desc')->get());
            $view->with('g_languages', Language::where('is_public', 1)->where('code', '!=', app()->getLocale())->get());
        });

        view()->composer('home.index', function($view) {
            $view->with('site', Setting::all()->first());
        });

        view()->composer('blocks.footer', function($view) {
            $view->with('locations', Location::where('is_public', 1)->get());
            $view->with('certificates', Certificate::where('is_public', 1)->get());
        });

        view()->composer('blocks.footer_service', function($view) {
            $view->with('service', Service::where('is_public', 1)->inRandomOrder()->first());
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
