<?php namespace Modules\Session\Commands;

class BeginResetProcessCommand
{
    public $email;

    public function __construct($email)
    {
        $this->email = $email;
    }
}