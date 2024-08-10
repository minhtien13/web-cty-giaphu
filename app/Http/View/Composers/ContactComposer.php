<?php

namespace App\Http\View\Composers;

use App\Models\Contact;
use App\Repositories\UserRepository;
use Illuminate\View\View;

class ContactComposer
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
        $contact = Contact::orderByDesc('id')->select("phone", "email", "address")->first();
        $view->with('contact', $contact);
    }
}