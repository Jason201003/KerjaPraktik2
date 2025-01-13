<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Determine where to redirect users after login based on their role.
     *
     * @return string
     */
    protected function redirectTo()
    {
        $user = Auth::user();

        // Check the role of the user
        if ($user->usertype === 'admin') {
            return '/admin/dashboard';
        } elseif ($user->usertype === 'manager') {
            return '/manager/dashboard';
        } elseif ($user->usertype === 'resepsionis') {
            return '/resepsionis/dashboard';
        }

        // Default redirection
        return RouteServiceProvider::HOME;
    }
}
