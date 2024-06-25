<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\PopularTopicsController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\VideoGroupController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\SubscriptionSellController;

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
    if(Auth::user())
    {
        return view('dashboard');
    }
    return redirect()->route('login');
});
Route::get('/login', [HomeController::class, 'Login'])->name('login');
Route::post('/loginstore', [HomeController::class, 'loginStore'])->name('loginstore');
Route::get('/logout',[HomeController::class,'Logout'])->name('logout');

Auth::routes();
Route::middleware(['auth'])->group(function () {

    // Category
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/category', [CategoryController::class, 'category'])->name('category');
    Route::get('/category/create', [CategoryController::class, 'createCategory'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'storeCategory'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('edit.category');
    Route::post('/category/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('update.category');
    Route::get('/category/destroy/{id}',[CategoryController::class,'categoryDestroy'])->name('destroy.category');

    // Sub Category //

    Route::get('/subcategory', [SubCategoryController::class, 'subcategory'])->name('subcategory');
    Route::get('/subcategory/create', [SubCategoryController::class, 'createsubCategory'])->name('subcategory.create');
    Route::post('/subcategory/store', [SubCategoryController::class, 'storesubCategory'])->name('subcategory.store');
    Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'Editsubcategory'])->name('edit.subcategory');
    Route::post('/subcategory/update/{id}', [SubCategoryController::class, 'Updatesubcategory'])->name('update.subcategory');
    Route::get('/subcategory/destroy/{id}',[SubCategoryController::class,'Destroysubcategory'])->name('destroy.subcategory');

    // Popular Topics //

    Route::get('/populartopic', [PopularTopicsController::class, 'populartopics'])->name('populartopics');
    Route::get('/populartopic/create', [PopularTopicsController::class, 'createPopulartopics'])->name('populartopic.create');
    Route::post('/populartopic/store', [PopularTopicsController::class, 'storePopulartopics'])->name('populartopic.store');
    Route::get('/populartopic/edit/{id}', [PopularTopicsController::class, 'EditPopulartopics'])->name('edit.populartopic');
    Route::post('/populartopic/update/{id}', [PopularTopicsController::class, 'UpdatePopulartopics'])->name('update.populartopic');
    Route::get('/populartopic/destroy/{id}',[PopularTopicsController::class,'DestroyPopulartopics'])->name('destroy.populartopic');

    // Video  //

    Route::get('/video', [VideoController::class, 'video'])->name('video');
    Route::get('/video/create', [VideoController::class, 'createvideo'])->name('video.create');
    Route::post('/video/store', [VideoController::class, 'storevideo'])->name('video.store');
    Route::get('/video/edit/{id}', [VideoController::class, 'Editvideo'])->name('edit.video');
    Route::post('/video/update/{id}', [VideoController::class, 'Updatevideo'])->name('update.video');
    Route::get('/video/destroy/{id}',[VideoController::class,'Destroyvideo'])->name('destroy.video');

    // Video Group
    Route::get('/video-group', [VideoGroupController::class, 'videogroup'])->name('video-group');
    Route::get('/video-group/create', [VideoGroupController::class, 'createVideogroup'])->name('videogroup.create');
    Route::post('/video-group/store', [VideoGroupController::class, 'storeVideogroup'])->name('videogroup.store');
    Route::get('/video-group/edit/{id}', [VideoGroupController::class, 'editVideogroup'])->name('edit.videogroup');
    Route::post('/video-group/update/{id}', [VideoGroupController::class, 'updateVideogroup'])->name('update.videogroup');
    Route::get('/video-group/destroy/{id}', [VideoGroupController::class, 'destroyVideogroup'])->name('destroy.videogroup');

    // Subscription

    Route::get('/subscription', [SubscriptionController::class, 'subscription'])->name('subscription');
    Route::get('/subscription/create', [SubscriptionController::class, 'createSubscription'])->name('subscription.create');
    Route::post('/subscription/store', [SubscriptionController::class, 'storeSubscription'])->name('subscription.store');
    Route::get('/subscription/edit/{id}', [SubscriptionController::class, 'editSubscription'])->name('edit.subscription');
    Route::post('/subscription/update/{id}', [SubscriptionController::class, 'updateSubscription'])->name('update.subscription');
    Route::get('/subscription/destroy/{id}', [SubscriptionController::class, 'destroySubscription'])->name('destroy.subscription');

    // Subscription - sell

    Route::get('/subscription-sell', [SubscriptionSellController::class, 'subscriptionsell'])->name('subscriptionsell');
    Route::get('/subscription-sell/create', [SubscriptionSellController::class, 'createSubscriptionsell'])->name('subscriptionsell.create');
    Route::post('/subscription-sell/store', [SubscriptionSellController::class, 'storeSubscriptionsell'])->name('subscriptionsell.store');
    Route::get('/subscription-sell/edit/{id}', [SubscriptionSellController::class, 'editSubscriptionsell'])->name('edit.subscriptionsell');
    Route::post('/subscription-sell/update/{id}', [SubscriptionSellController::class, 'updateSubscriptionsell'])->name('update.subscriptionsell');
    Route::get('/subscription-sell/destroy/{id}', [SubscriptionSellController::class, 'destroySubscriptionsell'])->name('destroy.subscriptionsell');
});


