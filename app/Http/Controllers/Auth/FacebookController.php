<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    /**
     * Redirect the user to the Discord authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Discord.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $fbUser = Socialite::driver('facebook')->user();
        dd($fbUser);
        /*$userProfile = [
            'name' => $discordUser->name,
            'email' => $discordUser->email,
            'password' => $discordUser->id,
        ];

        $user = User::where('email', $discordUser->email)->first();
        if($user) {
            Auth::login($user);
            return redirect()->route('dashboard');
        }

        $creator = new CreateNewUser();
        $createdUser = $creator->create($userProfile);

        Auth::login($createdUser);

        return redirect()->route('dashboard');*/
    }
}
