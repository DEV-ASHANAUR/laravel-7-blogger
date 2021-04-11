<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Date;

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

    //github login system
    public function github()
    {
        return Socialite::driver('github')->redirect();
    }
    public function githubRedirect()
    {
        $gituser = Socialite::driver('github')->user();
        // dd($gituser);
        $user = User::firstOrCreate([
            'email' => $gituser->email
        ],[
            'name' => $gituser->name,
            'email' => $gituser->email,
            'password' => Hash::make(Str::random(24)),
            'email_verified_at' => Date::now()
        ]);
        Auth::login($user,true);
        return redirect()->route('home');
    }

    //google login system
    public function google()
    {
        return Socialite::driver('google')->redirect();
    }
    public function googleRedirect()
    {
        $googleuser = Socialite::driver('google')->user();
        // dd($googleuser);
        $user = User::firstOrCreate([
            'email' => $googleuser->email
        ],[
            'name' => $googleuser->name,
            'email' => $googleuser->email,
            'password' => Hash::make(Str::random(24)),
            'email_verified_at' => Date::now()
        ]);
        Auth::login($user,true);
        return redirect()->route('home');
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('home.index');
    }
}
