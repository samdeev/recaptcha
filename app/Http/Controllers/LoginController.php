<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Show the application login form.
     *
     * @return View
    */
    public function create(): View
    {
        return \view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function loginUser(LoginRequest $request): RedirectResponse
    {
        // Validate the login request
        $this->validateLoginRequest($request);

        // Authenticate the user
        $this->authenticateUserRequest($request);

        // Redirect the user to home page
        return $this->redirectToHome();
    }


    /**
     *  Validate the login request.
     *
     * @param LoginRequest $request
     * @return void
     */
    private function validateLoginRequest(LoginRequest $request): void
    {
        // Check if the request is valid.
        $request->validated();
    }

    /**
     * Try to authenticate the given request.
     *
     * @param LoginRequest $request
     * @return void
     * @throws ValidationException
     */
    private function authenticateUserRequest(LoginRequest $request): void
    {
        if (!Auth::attempt($request->only('email', 'password'), $request->get('remember'))) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed')
            ]);
        }
    }

    /**
     * Redirect the user to home page.
     *
     * @return RedirectResponse
     */
    private function redirectToHome(): RedirectResponse
    {
        return Redirect::route(RouteServiceProvider::HOME);
    }
}
