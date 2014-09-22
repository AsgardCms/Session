<?php namespace Modules\Session\Commands;

class RegisterNewUserCommand
{
    public $username;
    public $email;
    public $password;
    public $password_confirmation;

    public function __construct($username, $email, $password, $password_confirmation)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->password_confirmation = $password_confirmation;
    }
}