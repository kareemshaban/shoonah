<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
  //  protected $redirectTo = RouteServiceProvider::HOME;


    protected function redirectTo()
    {
        $redirect = session('redirect_to', RouteServiceProvider::HOME);
        session()->forget('redirect_to'); // clean up after use
        return $redirect;
    }


    public function showLoginForm(Request $request)
    {
        if ($request->has('redirect_to')) {
            session(['redirect_to' => '/' . ltrim($request->input('redirect_to'), '/')]);
        }

        return view('auth.login');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        // If we have a redirect_to in session, honor it
        if (session()->has('redirect_to')) {
            $redirect = session()->pull('redirect_to'); // pull removes after getting
            return redirect($redirect);
        }

        // Fallback to your user-type logic
        if ($user->type == 1) {
            if ($user->verified == 0) {
                return redirect()->route('update-password', $user->id);
            } else {
                return redirect()->route('index');
            }
        } else {
            return redirect()->route('index');
        }
    }

}
