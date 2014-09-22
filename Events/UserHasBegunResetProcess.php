<?php namespace Modules\Session\Events;

class UserHasBegunResetProcess
{
    public $user;
    public $reminder;

    public function __construct($user, $reminder)
    {
        $this->user = $user;
        $this->reminder = $reminder;
    }
}