<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Display the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm(): View
    {
        return view('auth.forms.login');
    }

    /**
     * Display the login form and handle login attempts.
     *
     * @param LoginFormRequest $request
     * @return Redirector|RedirectResponse
     */
    public function loginFormAction(LoginFormRequest $request): Redirector|RedirectResponse
    {
        // Validate the incoming request data
        $data = $request->validated();

        // Attempt to authenticate the user
        if (auth('web')->attempt($data)) {
            // Redirect to the home page upon successful login
            return redirect(route('home'));
        }

        // Redirect back to the login page with an error message if login fails
        return redirect(route('login'))->withErrors(['email_or_pass' => 'User not found or wrong password']);
    }

    /**
     * Display the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegisterForm(): View
    {
        return view('auth.forms.register');
    }
    /**
     * Process the registration form data.
     *
     * @param RegisterFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerFormAction(RegisterFormRequest $request): Redirector|RedirectResponse
    {
        // Validate the incoming request data
        $data = $request->validated();

        // Create a new user with the validated data
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        // Attempt to log in the user if user creation was successful
        if($user){
            auth('web')->login($user);
        }

        // Redirect to the home page
        return redirect(route('home'));
    }
    /**
     * Log out the authenticated user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        auth('web')->logout();

        // Redirect to the home page after logout
        return redirect(route('home'));
    }
}
