<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Actions\Fortify\CreateNewUser;
use Laravel\Socialite\Facades\Socialite;
use GuzzleHttp\Exception\ClientException;
use Laravel\Socialite\Two\InvalidStateException;

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
        try {
            $fbUser = Socialite::driver('facebook')->user();
            $userProfile = [
                'name' => $fbUser->name,
                'username' => $fbUser->name,
                'email' => $fbUser->email,
                'password' => env('DEFAULT_PASSWORD'),
            ];

            $user = User::where('email', $fbUser->email)->first();
            if ($user) {
                Auth::login($user);
                return redirect()->route('dashboard');
            }

            $creator = new CreateNewUser();
            $createdUser = $creator->create($userProfile);

            Auth::login($createdUser);
        } catch (InvalidStateException $e) {
            return redirect()->route('home')->withError('Something went wrong with Facebook login. Please try again.');
        } catch (ClientException $e) {
            return redirect()->route('home')->withError('Something went wrong with Facebook login. Please try again.');
        }
        return redirect()->route('dashboard');
    }
}
