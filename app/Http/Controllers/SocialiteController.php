<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\Models\User;

class SocialiteController extends Controller
{
    
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback(Request $request)
    {
        $socialiteUser = Socialite::driver('facebook')->user();

        // Bu noktada $socialiteUser değişkeni, Facebook ile giriş yapma işlemi sonucu elde edilen kullanıcı verilerini içerir.

        // Kullanıcıyı Facebook kullanıcı kimliği ile ara ve bul
        $user = User::where('facebook_id', $socialiteUser->getId())->first();

        if ($user) {
            // Kullanıcı varsa giriş yap ve yönlendir
            auth()->login($user);
            return redirect()->route('product.create');
        } else {
            // Kullanıcı yoksa, yeni bir kullanıcı oluştur ve giriş yap
            $newUser = User::create([
                'name' => $socialiteUser->getName(),
                'email' => $socialiteUser->getEmail(),
                'facebook_id' => $socialiteUser->getId(),
                'password' => '', // Socialite ile giriş yaptığınızda parola gerekmeyeceği için boş bırakabilirsiniz.
            ]);

            auth()->login($newUser);
            return redirect()->route('product.create');
        }
    }

    public function redirectToGoogleProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleProviderCallback(Request $request)
    {
        $socialiteUser = Socialite::driver('google')->user();

        // Bu noktada $socialiteUser değişkeni, Google ile giriş yapma işlemi sonucu elde edilen kullanıcı verilerini içerir.

        // Kullanıcıyı e-posta adresine göre ara ve bul
        $user = User::where('email', $socialiteUser->email)->first();

        if ($user) {
            // Kullanıcı varsa giriş yap ve yönlendir
            auth()->login($user);
            return redirect()->route('product.create');
        } else {
            // Kullanıcı yoksa, yeni bir kullanıcı oluştur ve giriş yap
            $newUser = User::create([
                'name' => $socialiteUser->name,
                'email' => $socialiteUser->email,
                'password' => '', // Socialite ile giriş yaptığınızda parola gerekmeyeceği için boş bırakabilirsiniz.
            ]);

            auth()->login($newUser);
            return redirect()->route('product.create');
        }
    }
    public function redirectToGitHubProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGitHubProviderCallback()
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::where('email', $githubUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'name' => $githubUser->getName(),
                'email' => $githubUser->getEmail(),
                // Diğer kullanıcı bilgilerini buraya ekleyebilirsiniz.
            ]);
        }

        auth()->login($user);

        return redirect()->route('welcome'); // veya başka bir sayfaya yönlendirme yapabilirsiniz.
    }
    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleTwitterCallback()
    {
        try {
            $user = Socialite::driver('twitter')->user();
        } catch (\Exception $e) {
            return redirect()->route('auth.login')->with('error', 'Twitter ile giriş yaparken bir hata oluştu.');
        }

        // $user içerisinde Twitter ile ilgili kullanıcı bilgileri bulunur
        // Bu bilgileri kullanarak kullanıcıyı projede yönetebilirsiniz
        
        // Örnek: Twitter kullanıcısını kaydet veya giriş yap
        // Eğer kullanıcı zaten kayıtlıysa giriş yap, değilse kaydet ve giriş yap
        $existingUser = User::where('twitter_id', $user->id)->first();
        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            $newUser = new User();
            $newUser->name = $user->name;
            $newUser->twitter_id = $user->id;
            // Diğer gerekli kullanıcı bilgilerini ayarlayın
            $newUser->save();
            Auth::login($newUser);
        }

        return redirect()->route('home'); // Kullanıcı giriş yaptıktan sonra yönlendirme
    }
   
}
