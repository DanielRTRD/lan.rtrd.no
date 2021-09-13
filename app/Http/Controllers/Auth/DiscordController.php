<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Actions\Fortify\CreateNewUser;
use Laravel\Socialite\Facades\Socialite;

class DiscordController extends Controller
{
    /**
     * Redirect the user to the Discord authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('discord')->redirect();
    }

    /**
     * Obtain the user information from Discord.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $discordUser = Socialite::driver('discord')->user();
        $userProfile = [
            'username' => $discordUser->name,
            'email' => $discordUser->email,
            'password' => env('DEFAULT_PASSWORD'),
        ];

        $user = User::where('email', $discordUser->email)->first();
        if($user) {
            Auth::login($user);
            return redirect()->route('dashboard');
        }

        $creator = new CreateNewUser();
        $createdUser = $creator->create($userProfile);

        Auth::login($createdUser);

        return redirect()->route('dashboard');
    }
}
