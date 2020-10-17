<?php

namespace App\Services\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

/**
 * Trait AuthenticatesUser
 *
 * @package App\Services
 */
trait AuthenticatesUser
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request))
            return $this->sendLoginResponse($request);

        $this->sendFailedLoginResponse();
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function attemptLogin(Request $request): bool
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    protected function credentials(Request $request): array
    {
        return $request->only($this->username(), 'password');
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->intended();
    }

    /**
     * The user has been authenticated.
     *
     * @param Request $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect($this->redirectTo);
    }

    /**
     * @throws ValidationException
     */
    protected function sendFailedLoginResponse(): void
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    public function username(): string
    {
        return 'email';
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $this->loggedOut();
    }

    protected function loggedOut()
    {
        return redirect()->route(config('auth.redirect_after_logged_out'));
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
