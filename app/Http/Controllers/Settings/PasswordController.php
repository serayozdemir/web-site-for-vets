<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function showLinkRequestForm(Request $request)
    {
        return view('auth.password.request');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        if ($response == Password::RESET_LINK_SENT) {
            return redirect()->back()->with('status', 'Şifre sıfırlama bağlantısı e-posta adresinize gönderildi.');
        } else {
            return redirect()->back()->withErrors(['email' => 'Şifre sıfırlama bağlantısı gönderilemedi.']);
        }
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('settings.change-password', [
            'token' => $token,
            'email' => $request->email,
        ]);
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user(); // Şu anki oturum açmış kullanıcıyı alın

        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Mevcut şifre yanlış.']);
        }
    
        // Yeni şifre ile tekrar girilen şifrenin eşleşip eşleşmediğini kontrol et
        if ($request->input('new_password') !== $request->input('new_password_confirmation')) {
            return redirect()->back()->withErrors(['new_password' => 'Yeni şifreler eşleşmiyor.']);
        }
    
        // Yeni şifreyle veritabanındaki şifre aynı ise hata ver
        if (Hash::check($request->input('new_password'), $user->password)) {
            return redirect()->back()->withErrors(['new_password' => 'Yeni şifre eski şifreyle aynı olamaz.']);
        }
    
        // Yeni şifreyi güncelle
        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return redirect()->back()->with('success', 'Şifre başarıyla güncellendi.');
    }
}
