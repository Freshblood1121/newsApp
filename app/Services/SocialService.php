<?php

namespace App\Services;

use App\Models\User;
use App\Services\Contracts\SocialInterface;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialUser;
use PHPUnit\Logging\Exception;

class SocialService implements SocialInterface
{
    /**
     * @throws \Exception
     */
    public function loginAndGetRedirectUrl(SocialUser $socialUser): string
    {
        $user = User::query()->where('email', '=', $socialUser->getEmail())->first();
        if ($user === null) {
            return route('register');
        }

        $user->name = $socialUser->getName();
        $user->avatar = $socialUser->getAvatar();

        if ($user->save()) {
            Auth::loginUsingId($user->id);

            return route('account');
        }

        throw new \Exception("Did not save user");
    }
}
