<?php namespace Modules\Session\Http\Controllers;

use Illuminate\Routing\Controller;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Laracasts\Commander\CommanderTrait;
use Laracasts\Flash\Flash;
use Modules\Session\Exceptions\InvalidOrExpiredResetCode;
use Modules\Session\Exceptions\UserNotFoundException;
use Modules\Session\Http\Requests\LoginRequest;
use Modules\Session\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    use CommanderTrait;

    public function getLogin()
    {
        return View::make('session::public.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $remember = (bool)$request->get('remember_me', false);
        try {
            if ($user = Sentinel::authenticate($credentials, $remember)) {
                Flash::success('Successfully logged in.');
                return Redirect::route('dashboard.index', compact('user'));
            }
            Flash::error('Invalid login or password.');
        } catch (NotActivatedException $e) {
            Flash::error('Account not yet validated. Please check your email.');
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            Flash::error("Your account is blocked for {$delay} second(s).");
        }

        return Redirect::back()->withInput();
    }

    public function getRegister()
    {
        return View::make('session::public.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        $this->execute('Modules\Session\Commands\RegisterNewUserCommand', $request->all());

        Flash::success('Account created. Please check your email to activate your account.');

        return Redirect::route('register');
    }

    public function getLogout()
    {
        Sentinel::logout();

        return Redirect::route('login');
    }
}