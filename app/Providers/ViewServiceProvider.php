<?php

namespace App\Providers;

use App\Http\View\Composers\ContactComposer;
use App\Http\View\Composers\IntroComposer;
use App\Http\View\Composers\MenuComposer;
use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        // Using class based composers...
        View::composer('header', MenuComposer::class);

        // contact
        View::composer('main', ContactComposer::class);
        View::composer('contacts/contact', ContactComposer::class);
        View::composer('products/service', ContactComposer::class);
        View::composer('products/detail', ContactComposer::class);


        // intro
        View::composer('footer', IntroComposer::class);
        View::composer('contacts/intro', IntroComposer::class);

        // pages post
        View::composer('blogs/post', ContactComposer::class);
        View::composer('blogs/post', IntroComposer::class);
        View::composer('blogs/sidebar', MenuComposer::class);

    }
}