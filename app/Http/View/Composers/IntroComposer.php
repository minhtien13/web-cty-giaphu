<?php

namespace App\Http\View\Composers;

use App\Models\Intro;
use App\Repositories\UserRepository;
use Illuminate\View\View;

class IntroComposer
{

    public function __construct()
    {

    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $intro = Intro::orderByDesc('id')->select("content", "description")->first();
        $view->with('intro', $intro);
    }
}