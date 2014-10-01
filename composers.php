<?php
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

View::composer(['core::partials.sidebar-nav', 'core::partials.top-nav'], function($view)
{
    $view->with('user', Sentinel::check());
});

Event::listen('Modules\User\Events\RegisterSidebarMenuItemEvent', 'Modules\Blog\Listeners\SidebarNavigationListener');