<?php

namespace App\Services;

use App\SocialGoogleAccount;
use App\Patient;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialGoogleAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialGoogleAccount::whereProvider('google')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
            $account = new SocialGoogleAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'google'
            ]);
            
            $user = Patient::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
                $user = Patient::create([
                    'full_name' => $providerUser->getName(),
                    'username' => str_replace(' ', '', $providerUser->getName()),
                    'email' => $providerUser->getEmail(),
                    'password' => md5(rand(1,10000)),
                ]);
            }
            
            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }
}