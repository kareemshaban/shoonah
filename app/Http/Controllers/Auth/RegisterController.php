<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Redirect path after registration.
     */
    protected function redirectTo()
    {
        // Fallback — only used if registered() is not defined
        $redirect = session('redirect_to', RouteServiceProvider::HOME);
        session()->forget('redirect_to');
        return $redirect;
    }

    /**
     * Show the registration form and store redirect path
     */
    public function showRegistrationForm(Request $request)
    {
        if ($request->has('redirect_to')) {
            session(['redirect_to' => '/' . ltrim($request->input('redirect_to'), '/')]);
        }

        return view('auth.register');
    }

    /**
     * After registration is complete
     */
    protected function registered(Request $request, $user)
    {
        if (session()->has('redirect_to')) {
            $redirect = session()->pull('redirect_to');
            return redirect($redirect);
        }

        return redirect(RouteServiceProvider::HOME);
    }

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name'             => $data['name'],
            'email'            => $data['email'],
            'password'         => Hash::make($data['password']),
            'type'             => 2,
            'supplier_id'      => 0,
            'block'            => 0,
            'role_id'          => 0,
            'default_password' => '',
            'verified'         => 1,
        ]);

        Client::create([
            'name'       => $data['name'],
            'country_id' => 0,
            'city_id'    => 0,
            'address'    => '',
            'phone'      => '',
            'email'      => $data['email'],
            'mobile'     => '',
            'hasAccount' => $user->id,
            'gender'     => 0,
            'block'      => 0,
            'user_ins'   => $user->id,
            'user_upd'   => 0,
        ]);

        return $user;
    }
}
