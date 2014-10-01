<?php namespace Modules\Session\Entities;

use Cartalyst\Sentinel\Users\EloquentUser as SentryUser;
use Laracasts\Presenter\PresentableTrait;
use Illuminate\Support\Facades\Hash;

class User extends SentryUser
{
    use PresentableTrait;

    protected $fillable = [
        'email',
        'password',
        'permissions',
        'first_name',
        'last_name'
    ];

    protected $presenter = 'Modules\Session\Presenters\UserPresenter';

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
}
