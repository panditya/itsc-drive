<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Socialite;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function oauth($service) {
        return Socialite::driver($service)->redirect();
    }

    public function handleOauthCallback($service)
    {
      $userOauth = Socialite::driver($service)->user();

      $user = User::where(['email' => $userOauth->getEmail()])->first();
      if($user) {
          Auth::login($user);
          return redirect()->route('home');
      }
      else {
          return view('auth.register',['name' => $userOauth->getName(), 'email' => $userOauth->getEmail()]);
      }
    }
}
