<?php

namespace App\Services\Contracts;

use Laravel\Socialite\Contracts\User as SocialUser;
interface SocialInterface
{
    /**
     * @param SocialUser $socialUser
     * @return string
     */
    public function loginAndGetRedirectUrl(SocialUser $socialUser): string;
}
