<?php

namespace App\Providers;

use App\Http\View\Composers\ContactComposer;
use App\Http\View\Composers\IntroComposer;
use App\Http\View\Composers\MenuComposer;
use App\Http\View\Composers\SocialComposer;
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
        View::composer(['header', 'blogs/sidebar'], MenuComposer::class);

        // contact
        View::composer(
            [
                'main',
                'contacts.contact',
                'products.service',
                'products.detail'
            ],
            ContactComposer::class
        );

        // intro
        View::composer(['footer', 'contacts.intro', 'blogs.post'], IntroComposer::class);

        // pages post
        View::composer(['blogs.post', 'blogs.post', 'blogs.sidebar'], ContactComposer::class);

        // Social
        View::composer(['connects.list'], SocialComposer::class);
    }
}
