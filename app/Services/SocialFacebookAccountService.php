<?php

namespace App\Services;

use App\SocialFacebookAccount;
use App\Patient;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialFacebookAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialFacebookAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
            $account = new SocialFacebookAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
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