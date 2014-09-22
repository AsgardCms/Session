<?php namespace Modules\Session\Entities;

use Cartalyst\Sentinel\Users\EloquentUser as SentryUser;
use Laracasts\Presenter\PresentableTrait;

class User extends SentryUser
{
    use PresentableTrait;

    protected $fillable = [
        'email',
        'password',
        'permissions',
        'first_name',
        'last_name',
        'username'
    ];

    protected $presenter = 'Modules\Session\Presenters\UserPresenter';
}
