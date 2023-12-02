<?php

use App\Models\LoginSecurity;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\Settings\PasswordController;
use App\Http\Controllers\Settings\TwoFactorAuthenticationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Settings\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LoginSecurityController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/genel-muayene', '\App\Http\Controllers\ServiceController@generalExamination')->name('generalExamination');
Route::get('/vaccine', '\App\Http\Controllers\ServiceController@vaccine')->name('vaccine');
Route::get('/microchip-application', '\App\Http\Controllers\ServiceController@microchipApplication')->name('microchipApplication');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/register', [ RegisterController::class, 'showRegistrationForm'])->name('auth.register');
Route::post('/register', [ RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/facebook-redirect', '\App\Http\Controllers\SocialiteController@facebookRedirect');
Route::get('/facebook-callback', '\App\Http\Controllers\SocialiteController@facebookCallback');

Route::get('login/google', '\App\Http\Controllers\SocialiteController@redirectToGoogleProvider');
Route::get('login/google/callback', '\App\Http\Controllers\SocialiteController@handleGoogleProviderCallback');

Route::get('/login/github', [SocialiteController::class, 'redirectToGitHubProvider'])->name('github.login');
Route::get('/login/github/callback', [SocialiteController::class, 'handleGitHubProviderCallback']);

Route::get('login/twitter', '\App\Http\Controllers\SocialiteController@redirectToTwitter');
Route::get('login/twitter/callback', '\App\Http\Controllers\SocialiteController@handleTwitterCallback');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/products', [ProductController::class, 'store'])->name('product.store');
    Route::get('/settings/profile-information', ProfileController::class)->name('user-profile-information.edit');
    Route::get('/settings/change-password', [PasswordController::class, 'showResetForm'])->name('settings.change-password.show');
    Route::post('/settings/update-password', [PasswordController::class, 'updatePassword'])->name('settings.update-password');
    Route::post('/settings/profile-information', [UserController::class, 'updateProfile'])->name('settings.profile.information');
    Route::get('/settings/two-factor-authentication', [TwoFactorAuthenticationController::class, 'show'])->name('settings.two-factor-authentication.show');
    Route::put('/settings/profile-information', [ProfileController::class, 'updateProfile'])->name('user-profile-information.update');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/2fa-settings', [\App\Http\Controllers\LoginSecurityController:: class, 'show2faForm'])->name('auth.2fa_settings');

});

/* Route::group(['middleware' => ['auth']], function () {
    Route::get('/2fa', [TwoFactorAuthController::class, 'show2faForm'])->name('settings.2fa');
    Route::post('/enable-2fa', 'Auth\TwoFactorAuthController@enable2fa')->name('2fa.enable');
    Route::post('/disable-2fa', 'Auth\TwoFactorAuthController@disable2fa')->name('2fa.disable');
}); */


 Route::group(['prefix'=>'2fa'], function(){
    Route::get('/','\App\Http\Controllers\LoginSecurityController@show2faForm');
    Route::post('/generateSecret','\App\Http\Controllers\LoginSecurityController@generate2faSecret')->name('generate2faSecret');
    Route::post('/enable2fa','\App\Http\Controllers\LoginSecurityController@enable2fa')->name('enable2fa');
    Route::post('/disable2fa','\App\Http\Controllers\LoginSecurityController@disable2fa')->name('disable2fa');

    // 2fa middleware
    Route::post('/2faVerify', function () {
        return redirect(URL()->previous());
    })->name('2faVerify')->middleware('2fa');
});

// test middleware
Route::get('/test_middleware', function () {
    return "2FA middleware work!";
})->middleware(['auth', '2fa']);


Route::get('/forgot-password', [PasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [PasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', '\App\Http\Controllers\ProfileController@editProfile')->name('profile.edit');
    Route::put('/profile/update', '\App\Http\Controllers\ProfileController@updateProfile')->name('profile.update');
}); 




