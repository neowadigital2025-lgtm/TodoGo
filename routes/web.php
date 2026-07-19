<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\MagicLinkController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WorkspaceController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\SearchController;

Route::get('/', function () {
    return view('landing.index');
});

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {

    Route::get('/login', [MagicLinkController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [MagicLinkController::class, 'sendMagicLink'])
        ->name('login.send');

    Route::get('/verify/{token}', [MagicLinkController::class, 'verify'])
        ->name('login.verify');

    Route::get('/auth/google', [GoogleController::class, 'redirect'])
        ->name('google.login');

    Route::get('/auth/google/callback', [GoogleController::class, 'callback'])
        ->name('google.callback');

    Route::get('/register', [RegisterController::class, 'show'])
        ->name('register');

    Route::post('/register', [RegisterController::class, 'store'])
        ->name('register.store');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Tasks
    Route::get('/tasks', [TaskController::class, 'index'])
        ->name('tasks');

    // Workspaces
    Route::get('/workspaces', [WorkspaceController::class, 'index'])
        ->name('workspaces');

    // Calendar
    Route::get('/calendar', [CalendarController::class, 'index'])
        ->name('calendar');

    // Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])
        ->name('notifications');

    // Subscription
    Route::get('/subscription', [SubscriptionController::class, 'index'])
        ->name('subscription');

    // Settings
    Route::get('/settings', [SettingsController::class, 'index'])
        ->name('settings');

    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile');

    // Help Center
    Route::get('/help', [HelpController::class, 'index'])
        ->name('help');

    // Search
    Route::get('/search', [SearchController::class, 'index'])
        ->name('search');

    // Logout
    Route::post('/logout', function () {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    })->name('logout');

});
