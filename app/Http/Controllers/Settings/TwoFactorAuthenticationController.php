<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Fortify\Actions\EnableTwoFactorAuthentication;
use Laravel\Fortify\Actions\DisableTwoFactorAuthentication;
use Laravel\Fortify\TwoFactorAuthenticationProvider;
use Laravel\Fortify\RecoveryCodeGenerator;
use App\Models\User;

class TwoFactorAuthenticationController extends Controller
{
    public function show()
    {
        return view('settings.two-factor-authentication');
    }
    public function enable(Request $request)
    {
        app(EnableTwoFactorAuthentication::class)->__invoke($request->user());

        return redirect()->route('two-factor-authentication.show')
            ->with('status', 'two-factor-authentication-enabled');
    }
    public function disable(Request $request)
    {
        app(DisableTwoFactorAuthentication::class)->__invoke($request->user());

        return redirect()->route('two-factor-authentication.show')
            ->with('status', 'two-factor-authentication-disabled');
    }
    public function generateRecoveryCodes(Request $request)
    {
        app(RecoveryCodeGenerator::class)->generate($request->user());

        return redirect()->route('two-factor-authentication.show')
            ->with('status', 'recovery-codes-generated');
    }
}
