<?php


use App\Http\Controllers\Api\V1\ServiceCategoryController;
use App\Http\Controllers\Api\V1\ServiceController;
use App\Http\Controllers\Api\V1\CounterController;
use App\Http\Controllers\Api\V1\SettingController;
use App\Http\Controllers\Api\V1\PagesController;
use App\Http\Controllers\Api\V1\FooterController;
use App\Http\Controllers\Api\V1\DashboardController;
use App\Http\Controllers\Api\V1\ClientsController;
use App\Http\Controllers\Api\V1\CustomerMailController;
use App\Http\Controllers\Api\V1\HomeSliderController;
use App\Http\Controllers\Api\V1\ServeController;
use App\Http\Controllers\Api\V1\QuoteController;
use App\Http\Controllers\Api\V1\AboutController;
use App\Http\Controllers\Api\V1\VisionController;
use App\Http\Controllers\Api\V1\PolicyController;
use App\Http\Controllers\Api\Frontend\V1\HomeController;
use App\Http\Controllers\Api\Frontend\V1\CustomerController;
use App\Http\Controllers\Api\Auth\Customer\CustomerAuthController;
use App\Http\Controllers\Api\Auth\Admin\AdminAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', \App\Http\Controllers\Api\Auth\LoginCotroller::class);
Route::get('/tax-digital', [SettingController::class, 'getGlobalSettings']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/admin', function (Request $request) {
    return $request->admin();
})->middleware('auth:sanctum');

Route::get('/all-category-list', function () {
    return \App\Models\ServiceCategory::query()->get();
});

//dashboard route
Route::prefix('v1')->middleware(['auth:sanctum', 'ability:role-admin'])->group(function () {
    Route::apiResources([
        'service-category' => ServiceCategoryController::class,
        'service' => ServiceController::class,
        'setting' => SettingController::class,
        'pages' => PagesController::class,
        'footer' => FooterController::class,
        'custimer-mail' => CustomerMailController::class,
        'clients' => ClientsController::class,
        'hero-section' => HomeSliderController::class,
        'counter' => CounterController::class,
        'serve' => ServeController::class,
        'quote' => QuoteController::class,
        'about' => AboutController::class,
        'vision' => VisionController::class,
        'policy' => PolicyController::class,
        'complaint' => \App\Http\Controllers\Api\V1\ComplaintController::class,
    ]);

    Route::get('/complaint/{id}/download', [\App\Http\Controllers\Api\V1\ComplaintController::class, 'download']);

    Route::get('/all-page-list', [PagesController::class, 'allPageList']);
    Route::get('/dashboard', DashboardController::class);
    Route::get('/inactive-status/{id}', [HomeSliderController::class, 'inActiveStatus']);
    Route::get('/active-status/{id}', [HomeSliderController::class, 'activeStatus']);
    Route::get('/inactive-status/{id}', [HomeSliderController::class, 'inActiveStatus']);
    Route::get('/active-status/{id}', [HomeSliderController::class, 'activeStatus']);
    Route::get('/delete-service-image/{id}', [ServiceController::class, 'deleteImage']);
    Route::get('/counter-inactive-status/{id}', [CounterController::class, 'inActiveStatus']);
    Route::get('/counter-active-status/{id}', [CounterController::class, 'activeStatus']);
    Route::get('/serve-inactive-status/{id}', [ServeController::class, 'inActiveStatus']);
    Route::get('/serve-active-status/{id}', [ServeController::class, 'activeStatus']);
    Route::get('/quote-inactive-status/{id}', [QuoteController::class, 'inActiveStatus']);
    Route::get('/quote-active-status/{id}', [QuoteController::class, 'activeStatus']);
    Route::get('/about-inactive-status/{id}', [AboutController::class, 'inActiveStatus']);
    Route::get('/about-active-status/{id}', [AboutController::class, 'activeStatus']);
    Route::get('/vision-inactive-status/{id}', [VisionController::class, 'inActiveStatus']);
    Route::get('/vision-active-status/{id}', [VisionController::class, 'activeStatus']);
    Route::get('/policy-inactive-status/{id}', [PolicyController::class, 'inActiveStatus']);
    Route::get('/policy-active-status/{id}', [PolicyController::class, 'activeStatus']);
});



Route::prefix('frontend/v1')->group(function () {
    Route::get('/get-categories', [HomeController::class, 'getCategories']);
    Route::get('/get-all-settings', [HomeController::class, 'getAllSettings']);
    Route::get('/get-custom-page/{slug}', [HomeController::class, 'getCustomPage']);
    Route::post('/store-mail', [CustomerController::class, 'store']);
    Route::post('/store-custom-quote', [CustomerController::class, 'storeQuote']);
    Route::apiResource('customer', CustomerController::class)->middleware('auth:sanctum');
    Route::get('/hero-section', [HomeController::class, 'getHeroData']);
    Route::get('/get-service-data/{slug}', [HomeController::class, 'showService']);
    Route::get('/get-services', [HomeController::class, 'getServices']);
    Route::get('/get-all-services', [HomeController::class, 'getallServices']);
    Route::apiResource('customer', CustomerController::class)->middleware('auth:sanctum');
    Route::get('/hero-section', [HomeController::class, 'getHeroData']);
    Route::get('/get-counters', [HomeController::class, 'getCounters']);
    Route::get('/get-serves', [HomeController::class, 'getServes']);
    Route::get('/get-quotes', [HomeController::class, 'getQuotes']);
    Route::get('/get-about-content', [HomeController::class, 'getAboutContent']);
    Route::get('/get-vision-content', [HomeController::class, 'getVisionContent']);
    Route::get('/get-policies', [HomeController::class, 'getPolicies']);
    Route::post('/store-complaint', [\App\Http\Controllers\Api\Frontend\V1\ComplaintController::class, 'store']);
});


// Auth Controller

Route::post('/admin/login', [AdminAuthController::class, 'login']);

Route::get('/storage/link', fn() => \Illuminate\Support\Facades\Artisan::call('storage:link'));
