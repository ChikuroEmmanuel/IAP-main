<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ForgotPasswordController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Auth::routes([
    'verify'=> true
]);
 Route::post('/generate-token', [App\Http\Controllers\TokenController::class, 'generate'])->name('generate-token');

Route::get('/generate-token', function () {
    return view('generate-tokens');
})->name('generate-token');

Route::get('subscribe',[App\Http\Controllers\SubscriptionController::class,'index'])->name('subscribe');
Route::post('add/purchases', [App\Http\Controllers\PurchasesController::class,'add'])->name('add.purchases');

use App\Http\Controllers\SubscriptionController;

Route::get('/apply', [SubscriptionController::class, 'showSubscriptionForm'])->name('subscribe.form');
Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');

require __DIR__.'/auth.php';
