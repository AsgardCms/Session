<?php
View::composer(array('CoreModule::layouts.master', 'CoreModule::layouts.account', 'ProfileModule::admin.profile'), function($view)
{
    $view->with('user', \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check());
});