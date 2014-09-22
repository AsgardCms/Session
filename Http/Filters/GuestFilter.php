<?php namespace Modules\Session\Http\Filters;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Redirect;

class GuestFilter
{
    public function filter()
    {
        if (Sentinel::check()) {
            return Redirect::route('dashboard.index');
        }
    }
}