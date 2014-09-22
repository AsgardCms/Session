<?php namespace Modules\Session\Commands;

use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Event;
use Laracasts\Commander\CommandHandler;
use Modules\Session\Events\UserHasBegunResetProcess;
use Modules\Session\Exceptions\UserNotFoundException;
use Modules\Session\Forms\ResetBeginForm;

class BeginResetProcessCommandHandler implements CommandHandler
{
    /**
     * @var ResetBeginForm
     */
    private $form;

    public function __construct(ResetBeginForm $form)
    {
        $this->form = $form;
    }

    /**
     * Handle the command
     *
     * @param $command
     * @throws UserNotFoundException
     * @return mixed
     */
    public function handle($command)
    {
        $this->form->validate((array) $command);

        $user = $this->findUser((array) $command);

        $reminder = Reminder::exists($user) ?: Reminder::create($user);

        Event::fire('Modules.Session.Events.UserHasBegunResetProcess', new UserHasBegunResetProcess($user, $reminder));
    }

    private function findUser($credentials)
    {
        $user = Sentinel::findByCredentials((array) $credentials);
        if ($user) {
            return $user;
        }

        throw new UserNotFoundException();
    }
}