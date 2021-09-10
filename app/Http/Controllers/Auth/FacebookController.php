<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Actions\Fortify\CreateNewUser;
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
        $userProfile = [
            'name' => $fbUser->name,
            'email' => $fbUser->email,
            'password' => $fbUser->id,
        ];

        $user = User::where('email', $fbUser->email)->first();
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
