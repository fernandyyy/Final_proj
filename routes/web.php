<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Log;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\TwoFactorAuthController;
use App\Http\Controllers\Auth\SettingsController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\Auth\GithubController;
use App\Http\Controllers\CandidateController;
use App\Models\UserLog;
use App\Http\Controllers\LogController;


Route::get('/logs/candidates', [LogController::class, 'index'])->name('logs.candidates');

Route::resource('candidates', CandidateController::class);
Route::get('/logs', function () {
    return view('logs.index', [
        'logs' => UserLog::with('user')->latest()->paginate(10),
    ]);
})->middleware('auth');
Route::get('/auth/github', [GithubController::class, 'redirectToGithub'])->name('auth.github');
Route::get('/auth/github/callback', [GithubController::class, 'handleGithubCallback'])->name('auth.github.callback');

Route::get('/two-factor', [TwoFactorAuthController::class, 'show'])->name('auth.two-factor');
Route::post('/two-factor', [TwoFactorAuthController::class, 'verify']);
Route::post('/two-factor/resend', [TwoFactorAuthController::class, 'resend'])->name('auth.two-factor.resend');


Route::middleware('auth')->group(function () {
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings/two-factor', [SettingsController::class, 'toggleTwoFactor'])->name('settings.toggleTwoFactor');
});

Route::resource('products', ProductController::class);

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
