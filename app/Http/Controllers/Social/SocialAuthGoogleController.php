<?php

namespace App\Http\Controllers\Social;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\Services\SocialGoogleAccountService;
use Illuminate\Support\Facades\Auth;

class SocialAuthGoogleController extends Controller
{
    /**
     * Create a redirect method to google api.
     *
     * @return void
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Return a callback method from google api.
     *
     * @return callback URL from google
     */
    public function callback(SocialGoogleAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('google')->user());
        Auth::guard('patient')->login($user);
        return redirect()->to('/');
    }
}
