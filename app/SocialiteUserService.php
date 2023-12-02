<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\SocialiteUser;

class SocialiteUserService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        /* 
        * provider'dan gelen user id ile kullanıcı getir
        */
        $socialiteUser = SocialiteUser::whereProvider('facebook')->whereProviderUserId($providerUser->getId())->first();

        /*
        * eğer kullanıcı var ise, yani daha önceden 1 kere sisteme kayıt olmuş ise kullanıcı otomatik olarak giriş yapsın
        */
        if ($socialiteUser) {
            return $socialiteUser->user;
        } else {
            /*
            * database'de "socialite_user" tablosuna kaydet kullanıcıyı ve facebook id'sini kaydet
            */
            $socialiteUser = new SocialiteUser([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            /*
            * normal kullanıcıların olduğu yani "user" tablosundan kullanıcı çek
            */
            $user = User::whereEmail($providerUser->getEmail())->first();

            /*
            * eğer "user" tablosunda da bu kullanıcı yok ise siteye ilk defa gelmiştir, user tablosuna da kaydet
            */
            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                ]);
            }

            $socialiteUser->user()->associate($user);
            $socialiteUser->save();

            return $user;
        }
    }
}
