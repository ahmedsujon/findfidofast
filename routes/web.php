<?php

use App\Http\Controllers\Subscription\SubscriptionController;
use App\Livewire\App\HomeComponent;
use Illuminate\Support\Facades\Route;
use App\Livewire\App\Pages\AboutUsComponent;
use App\Livewire\App\Pages\PricingComponent;
use App\Livewire\App\LostDog\LostDogComponent;
use App\Livewire\App\Donation\DonationComponent;
use App\Livewire\App\FoundDog\FoundDogComponent;
use App\Livewire\App\ContactUs\ContactUsComponent;
use App\Livewire\App\User\Auth\ForgotPasswordComponent;
use App\Livewire\App\User\Auth\UpdatePasswordComponent;
use App\Livewire\App\Subscription\SubscriptionComponent;

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

Route::get('/', HomeComponent::class)->name('app.home');
Route::get('/about-us', AboutUsComponent::class)->name('app.aboutus');
Route::get('/lost-dogs', LostDogComponent::class)->name('app.lost.dogs');
Route::get('/found-dogs', FoundDogComponent::class)->name('app.found.dogs');
Route::get('/pricing', PricingComponent::class)->name('app.pricing');
Route::get('/donation', DonationComponent::class)->name('app.donation');
Route::get('/contact-us', ContactUsComponent::class)->name('app.contact');
Route::get('/subscription', SubscriptionComponent::class)->name('app.subscription');

// Forget Password
Route::get('user-reset-password', ForgotPasswordComponent::class)->name('user.reset.password');
Route::get('user-change-password', UpdatePasswordComponent::class)->name('user.change.password');

// Subscription
Route::get('payment', [SubscriptionController::class, 'index']);
Route::post('charge', [SubscriptionController::class, 'charge']);


//Call Route Files
require __DIR__ . '/admin.php';
require __DIR__ . '/vendor.php';
require __DIR__ . '/user.php';
