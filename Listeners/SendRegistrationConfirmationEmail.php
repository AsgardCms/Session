<?php namespace Modules\Session\Listeners;

use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Illuminate\Support\Facades\Mail;
use Laracasts\Commander\Events\EventListener;

class SendRegistrationConfirmationEmail extends EventListener
{
    public function whenUserHasRegistered($event)
    {
        $user = $event->user;

        $activation = Activation::create($user);
        $data = [
            'user' => $user,
            'activationcode' => $activation->code
        ];
        Mail::queue('SessionModule::emails.welcome',$data,
            function ($m) use ($user) {
                $m->to($user->email)->subject('Welcome on your SocialDashy.');
            }
        );
    }
}