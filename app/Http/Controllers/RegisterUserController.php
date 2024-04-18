<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RegisterUserController extends Controller
{
    /**
     * Display the user registration form.
     *
     * @return View
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle the registration request and redirect
     * the user to the home page.
     *
     * @param RegisterUserRequest $request
     * @return RedirectResponse
     */
    public function store(RegisterUserRequest $request): RedirectResponse
    {
        $this->createUserWithHashedPassword($request);

        $this->attemptLogin($request);

        return Redirect::route(RouteServiceProvider::HOME);
    }

    /**
     * Responsible for creating a new user.
     * It validates the request data, hashes the password
     * and then create a User instance.
     *
     * @param RegisterUserRequest $request
     * @return void
     *
     */
    private function createUserWithHashedPassword(RegisterUserRequest $request): void
    {
        $validatedData = $request->validated();
        $passwordHash = Hash::make($validatedData['password']);
        $userAttributes = array_merge($validatedData, ['password' => $passwordHash]);

        User::create($userAttributes);
    }

    /**
     * Attempt to authenticate/log in the user.
     *
     * @param RegisterUserRequest $request
     * @return void
     */
    private function attemptLogin(RegisterUserRequest $request): void
    {
        Auth::attempt($request->only('email', 'password'));
    }
}
