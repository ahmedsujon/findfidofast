<?php

use App\Livewire\App\HomeComponent;
use Illuminate\Support\Facades\Route;
use App\Livewire\App\Pages\AboutUsComponent;
use App\Livewire\App\Pages\PricingComponent;
use App\Livewire\App\Pages\PartnersComponent;
use App\Livewire\App\LostDog\LostDogComponent;
use App\Livewire\App\Pages\ContactUsComponent;
use App\Livewire\App\Pages\HowItsWorkComponent;
use App\Livewire\App\Donation\DonationComponent;
use App\Livewire\App\FoundDog\FoundDogComponent;
use App\Livewire\App\Pages\PrivacyPolicyComponent;
use App\Livewire\App\Subscription\PaymentComponent;
use App\Livewire\App\Pages\TermsConditionsComponent;
use App\Http\Controllers\Donation\DonationController;
use App\Livewire\App\Donation\DonationSuccessComponent;
use App\Livewire\App\User\Auth\ForgotPasswordComponent;
use App\Livewire\App\User\Auth\UpdatePasswordComponent;
use App\Livewire\App\Subscription\SubscriptionComponent;
use App\Livewire\App\Subscription\PaymentSuccessComponent;
use App\Http\Controllers\Subscription\SubscriptionController;
use App\Livewire\App\LostDogReport\LostReportStepOneComponent;
use App\Livewire\App\LostDogReport\LostReportStepTwoComponent;
use App\Livewire\App\Subscription\SubscriptionSuccessComponent;
use App\Livewire\App\LostDogReport\LostReportStepThreeComponent;
use App\Livewire\App\FoundDogReport\FoundDogReportStepOneComponent;
use App\Livewire\App\FoundDogReport\FoundDogReportStepTwoComponent;
use App\Livewire\App\FoundDogReport\FoundDogReportStepThreeComponent;
use App\Livewire\App\FreeLostDogReport\FreeDogReportStepOneComponent;
use App\Livewire\App\FreeLostDogReport\FreeDogReportStepTwoComponent;
use App\Livewire\App\FreeLostDogReport\FreeDogReportStepThreeComponent;

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
Route::get('/lost-dogs', LostDogComponent::class)->name('app.lost.dogs');
Route::get('/found-dogs', FoundDogComponent::class)->name('app.found.dogs');
Route::get('/pricing', PricingComponent::class)->name('app.pricing');
Route::get('/donation', DonationComponent::class)->name('app.donation');

// Pages Routes
Route::get('/contact-us', ContactUsComponent::class)->name('app.contact');
Route::get('/about-us', AboutUsComponent::class)->name('app.aboutus');
Route::get('/partners', PartnersComponent::class)->name('app.partners');
Route::get('/privacy-policy', PrivacyPolicyComponent::class)->name('app.privacy.policy');
Route::get('/terms-conditions', TermsConditionsComponent::class)->name('app.terms.conditions');
Route::get('/how-its-work', HowItsWorkComponent::class)->name('app.how.its.work');

// Lost Dog report
Route::get('lost-dog-report-first', LostReportStepOneComponent::class)->name('user.report.first.step');
Route::get('lost-dog-report-seceond', LostReportStepTwoComponent::class)->name('user.report.seceond.step');
Route::get('lost-dog-report-third', LostReportStepThreeComponent::class)->name('user.report.third.step');

// Free Lost Dog report
Route::get('free-lost-dog-report-first', FreeDogReportStepOneComponent::class)->name('user.free.report.first.step');
Route::get('free-lost-dog-report-seceond', FreeDogReportStepTwoComponent::class)->name('user.free.report.seceond.step');
Route::get('free-lost-dog-report-third', FreeDogReportStepThreeComponent::class)->name('user.free.report.third.step');

// Found Dog Report
Route::get('found/dog/report/first/step', FoundDogReportStepOneComponent::class)->name('user.found.dog.report.first.step');
Route::get('found/dog/report/seceond/step', FoundDogReportStepTwoComponent::class)->name('user.found.dog.report.seceond.step');
Route::get('found/dog/report/third/step', FoundDogReportStepThreeComponent::class)->name('user.found.dog.report.third.step');


// Forget Password
Route::get('user-reset-password', ForgotPasswordComponent::class)->name('user.reset.password');
Route::get('user-change-password', UpdatePasswordComponent::class)->name('user.change.password');

// Donation
Route::get('/donation', DonationComponent::class)->name('app.donation');
Route::post('charge', [DonationController::class, 'charge']);
Route::get('/donation-success/{transaction_id}', DonationSuccessComponent::class)->name('app.donation.success');

// Subscription
Route::get('/subscription', SubscriptionComponent::class)->name('app.subscription');
Route::get('/subscription-payment', PaymentComponent::class)->name('app.payment');
Route::post('/payment', [SubscriptionController::class, 'subscription']);

// Route::prefix('/')->middleware('auth:web')->group(function () {});

Route::get('/subscription-success/{transaction_id}', SubscriptionSuccessComponent::class)->name('app.subscription.success');


//Call Route Files
require __DIR__ . '/admin.php';
require __DIR__ . '/vendor.php';
require __DIR__ . '/user.php';
