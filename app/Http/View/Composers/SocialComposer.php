<?php

namespace App\Http\View\Composers;

use App\Models\Social;
use App\Repositories\UserRepository;
use Illuminate\View\View;

class SocialComposer
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
        $socials = Social::orderByDesc('id')->where("is_status", 1)
                   ->select('name', 'thumb', 'is_link')->get();
        $view->with('socials', $socials);
    }
}
