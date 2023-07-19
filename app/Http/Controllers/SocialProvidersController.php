<?php

namespace App\Http\Controllers;

use App\Services\Contracts\SocialInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse as SymfonyRedirectResponse;
use Illuminate\Foundation\Application;
class SocialProvidersController extends Controller
{
    public function redirect(string $driver): SymfonyRedirectResponse | RedirectResponse
    {
        return Socialite::driver($driver)->redirect();
    }

    /**
     * @param string $driver
     * @param SocialInterface $social
     * @return Redirector|RedirectResponse
     */
    public function callback(string $driver, SocialInterface $social): Redirector|RedirectResponse
    {   //token
        return redirect(
            $social->loginAndGetRedirectUrl(
                Socialite::driver($driver)->user()
            ));
    }
}
