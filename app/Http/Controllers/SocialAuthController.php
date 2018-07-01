<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Socialite;

class SocialAuthController extends Controller
{
    //

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        // when facebook call us a with token
        $user = Socialite::driver('google')->stateless()->user();

        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);
        return Redirect::to('/home');
    }

    /**
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'password'=>123,
            'provider' => 'google',
            'provider_id' => $user->id
        ]);
    }
}
