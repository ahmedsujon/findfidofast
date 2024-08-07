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
use App\Livewire\App\FoundDog\FoundDogDetailsComponent;
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
use App\Livewire\App\FreePlan\FreePlanComponent;
use App\Livewire\App\FreePlan\FreePlanStepOneComponent;
use App\Livewire\App\FreePlan\FreePlanStepTwoComponent;
use App\Livewire\App\LostDog\LostDogDetailsComponent;
use App\Livewire\App\Pages\FAQComponent;
use App\Livewire\App\PlanA\PlanAComponent;
use App\Livewire\App\PlanA\PlanAStepOneComponent;
use App\Livewire\App\PlanB\PlanBComponent;
use App\Livewire\App\PlanB\PlanBStepOneComponent;
use App\Livewire\App\PlanB\PlanBStepTwoComponent;
use App\Livewire\App\PlanC\PlanCComponent;
use App\Livewire\App\PlanC\PlanCStepOneComponent;
use App\Livewire\App\PlanC\PlanCStepTwoComponent;
use App\Livewire\App\PlanD\PlanDComponent;
use App\Livewire\App\PlanD\PlanDStepOneComponent;
use App\Livewire\App\PlanD\PlanDStepTwoComponent;
use App\Livewire\App\Profile\MessageComponent;
use App\Livewire\App\Profile\PaymentHistoryComponent;
use App\Livewire\App\Profile\PersonalInfoComponent;

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

// Lost Dog Routes
Route::get('/lostdogs', LostDogComponent::class)->name('app.lost.dogs');
Route::get('/lostdogs/details/{id}', LostDogDetailsComponent::class)->name('app.lost.dogs.details');

// Found Dog Routes
Route::get('/found-dogs', FoundDogComponent::class)->name('app.found.dogs');
Route::get('/found-dogs/details/{id}', FoundDogDetailsComponent::class)->name('app.found.dogs.details');

Route::get('/pricing', PricingComponent::class)->name('app.pricing');
Route::get('/donation', DonationComponent::class)->name('app.donation');

// Pages Routes
Route::get('/contact-us', ContactUsComponent::class)->name('app.contact');
Route::get('/about-us', AboutUsComponent::class)->name('app.aboutus');
Route::get('/partners', PartnersComponent::class)->name('app.partners');
Route::get('/privacy-policy', PrivacyPolicyComponent::class)->name('app.privacy.policy');
Route::get('/terms-conditions', TermsConditionsComponent::class)->name('app.terms.conditions');
Route::get('/how-it-works', HowItsWorkComponent::class)->name('app.how.its.work');
Route::get('/faq', FAQComponent::class)->name('app.faq');

// Lost Dog report
Route::get('lost-dog-report-first', LostReportStepOneComponent::class)->name('user.report.first.step');
Route::get('lost-dog-report-seceond', LostReportStepTwoComponent::class)->name('user.report.seceond.step');
Route::get('lost-dog-report-third', LostReportStepThreeComponent::class)->name('user.report.third.step');

// Free Lost Dog report
Route::get('free-plan-report', FreePlanComponent::class)->name('free.plan.report');
Route::get('free-plan-report-step-two', FreePlanStepOneComponent::class)->name('free.plan.report.step.two');
Route::get('free-plan-report-step-three', FreePlanStepTwoComponent::class)->name('free.plan.report.step.three');

Route::prefix('/')->middleware('auth:web')->group(function () {

    // Plan A
    Route::get('text-plan-report', PlanAComponent::class)->name('free.plan.report');
    Route::get('text-plan-report-step-two', PlanAStepOneComponent::class)->name('free.plan.report.step.two');

    // Plan B
    Route::get('plan-one-report', PlanBComponent::class)->name('plan.one.report');
    Route::get('plan-one-report-step-two', PlanBStepOneComponent::class)->name('plan.one.report.step.two');
    Route::get('plan-one-report-step-three', PlanBStepTwoComponent::class)->name('plan.one.report.step.three');

    // Plan C
    Route::get('plan-two-report', PlanCComponent::class)->name('plan.two.report');
    Route::get('plan-two-report-step-two', PlanCStepOneComponent::class)->name('plan.two.report.step.two');
    Route::get('plan-two-report-step-three', PlanCStepTwoComponent::class)->name('plan.two.report.step.three');

    // Plan D
    Route::get('plan-three-report', PlanDComponent::class)->name('plan.three.report');
    Route::get('plan-three-report-step-two', PlanDStepOneComponent::class)->name('plan.three.report.step.two');
    Route::get('plan-three-report-step-three', PlanDStepTwoComponent::class)->name('plan.three.report.step.three');

    // Plan E
    Route::get('plan-four-report', FreePlanComponent::class)->name('plan.four.report');
    Route::get('plan-four-report-step-two', FreePlanStepOneComponent::class)->name('plan.four.report.step.two');
    Route::get('plan-four-report-step-three', FreePlanStepTwoComponent::class)->name('plan.four.report.step.three');

    // Found Dog Report
    Route::get('found/dog/report/first/step', FoundDogReportStepOneComponent::class)->name('user.found.dog.report.first.step');
    Route::get('found/dog/report/seceond/step', FoundDogReportStepTwoComponent::class)->name('user.found.dog.report.seceond.step');
    Route::get('found/dog/report/third/step', FoundDogReportStepThreeComponent::class)->name('user.found.dog.report.third.step');

    // Profile Pages Routes
    Route::get('messages', MessageComponent::class)->name('messages');
    Route::get('personal-information', PersonalInfoComponent::class)->name('personal.information');
    Route::get('payment-history', PaymentHistoryComponent::class)->name('payment.history');
});

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


Route::get('/subscription-success/{transaction_id}', SubscriptionSuccessComponent::class)->name('app.subscription.success');

use App\Http\Controllers\SmsTwilioController;

Route::get('sms/send', [SmsTwilioController::class, 'sendSms']);

//Call Route Files
require __DIR__ . '/admin.php';
require __DIR__ . '/vendor.php';
require __DIR__ . '/user.php';
