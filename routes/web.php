<?php

use App\Http\Controllers\AdminListingController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//----------------------------------- frontend paths --------------------------------//

Route::get('/', [FrontController::class,'index'])->name('home');
Route::get('/plans', [HomeController::class,'plans'])->name('plans');

Route::prefix('checkout')->middleware('auth')->group(function ()
{
    Route::get('/{plan}', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::get('/success/{plan_id}', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');
    Route::get('/download/{session_id}', [CheckoutController::class, 'download'])->name('checkout.download');
});

Route::view('/plisting', 'preview');

// ----------------------- provider paths ----------------------------//
Route::prefix('provider')->group(function ()
{
    Auth::routes();
});
Route::get('/provider', function ()
{
    return redirect()->route('login');
});
Route::middleware('auth')->prefix('provider')->group(function ()
{
    Route::get('/dashboard',[\App\Http\Controllers\ProviderController::class,'index'])->name('provider.dashboard');
    Route::get('/addlisting',[\App\Http\Controllers\ProviderController::class,'addlisting'])->name('provider.addlisting');
    Route::post('/addlisting',[\App\Http\Controllers\ProviderController::class,'storeListing'])->name('provider.addlisting');
    Route::get('/listing/{id}',[\App\Http\Controllers\ProviderController::class,'show'])->name('provider.listing');
    Route::get('/listing/{id}/edit',[\App\Http\Controllers\ProviderController::class,'edit'])->name('provider.edit');
    Route::post('/listing/{id}',[\App\Http\Controllers\ProviderController::class,'update'])->name('provider.update');
    
    Route::get('/billing',[\App\Http\Controllers\BillingController::class,'index'])->name('provider.billing');


    Route::get('/basic',[\App\Http\Controllers\ProviderController::class,'basic'])->name('provider.basic');
    Route::get('/org',[\App\Http\Controllers\ProviderController::class,'org'])->name('provider.org');
    Route::get('/featured',[\App\Http\Controllers\ProviderController::class,'featured'])->name('provider.featured');
    Route::get('/video',[\App\Http\Controllers\ProviderController::class,'video'])->name('provider.video');
});
// Route::get('listingcount',  [AdminListingController::class,'listingcount'])->name('listingcount');
Route::get('listingclicks',  [AdminListingController::class,'listingclicks'])->name('listingclicks');
Route::get('basic-clicks',  [AdminListingController::class,'basicClicks'])->name('basic-clicks');

//----------------------------------- admin paths --------------------------------//
    // admin login
    Route::get('/admin/login', function () {
        return view('admin.login');
    })->name('admin.login');

    Route::get('/admin', function ()
    {
        return view('admin.login');
    });

    // admin dashboard
    Route::post('/admin/check', [App\Http\Controllers\AdminController::class, 'check'])->name('admin.check');
    Route::post('/admin/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');
    
    Route::middleware('checklogin')->prefix('admin')->group(function ()
    {
        Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
        
        // category resources
        Route::resource('/category', App\Http\Controllers\CategoryController::class)->names('admin.category');
        Route::get('/showcategoryorder', [App\Http\Controllers\CategoryController::class,'showcategoryorder'])->name('admin.showcategoryorder');
        Route::post('/categoryorder', [App\Http\Controllers\CategoryController::class,'categoryorder'])->name('admin.categoryorder');
       
        // sub category resources
        Route::resource('/subcategory', App\Http\Controllers\SubCategoryController::class)->names('admin.subcategory');
        Route::post('/updatefeatured', [App\Http\Controllers\SubCategoryController::class,'updatefeatured'])->name('admin.updatefeatured');
        Route::resource('/timing', App\Http\Controllers\TimingController::class)->names('admin.timing');

        // country resources
        Route::resource('/country', App\Http\Controllers\CountryController::class)->names('admin.country');
        Route::post('/country/updatefeatured', [App\Http\Controllers\CountryController::class,'updatefeatured'])->name('admin.country.updatefeatured');
       
       
        Route::resource('/city', App\Http\Controllers\CityController::class)->names('admin.city');
        Route::resource('/content', App\Http\Controllers\ContentController::class)->names('admin.content');
        
        Route::resource('/url', App\Http\Controllers\UrlController::class)->names('admin.url');
        Route::get('/url/{id}/order', [App\Http\Controllers\UrlController::class,'order'])->name('admin.url.order');
        Route::get('/url/{id}/edit', [App\Http\Controllers\UrlController::class,'edit'])->name('admin.url.edit');
        Route::post('/url/{id}/update', [App\Http\Controllers\UrlController::class,'update'])->name('admin.url.update');
        Route::post('/url/{id}/updateorder', [App\Http\Controllers\UrlController::class,'updateorder'])->name('admin.url.updateorder');
        Route::post('/url/find', [App\Http\Controllers\UrlController::class,'find'])->name('admin.url.find');
        
        // ajax for content 
        Route::post('/getsubcategory',[App\Http\Controllers\ContentController::class,'getsubcategory'])->name('admin.getsubcategory');
        Route::post('/getcity',[App\Http\Controllers\ContentController::class,'getcity'])->name('admin.getcity');
        
        // listing paths
        Route::get('/listing',[App\Http\Controllers\AdminListingController::class,'index'])->name('admin.listing');
        Route::get('/listing/{id}/edit',[App\Http\Controllers\AdminListingController::class,'edit'])->name('admin.listing.edit');
        Route::resource('provider',App\Http\Controllers\UserController::class)->names('admin.provider');
        Route::post('/updatelisting/{id}',[App\Http\Controllers\AdminListingController::class,'update'])->name('admin.updatelisting');
        Route::get('/getlisting',[App\Http\Controllers\AdminListingController::class,'getlisting'])->name('admin.getlisting');
        Route::post('/makepromoted',[App\Http\Controllers\AdminListingController::class,'makePromoted'])->name('admin.makePromoted');
        
    });


    Route::get('{any}', [FrontController::class,'core']);
    Route::get('{any}/{any2}', [FrontController::class,'core']);
    Route::get('{any}/{any2}/{any3}', [FrontController::class,'core']);
    Route::get('{any}/{any2}/{any3}/{any4}', [FrontController::class,'core']);
    Route::get('{any}/{any2}/{any3}/{any4}/{any5}', [FrontController::class,'core']);
