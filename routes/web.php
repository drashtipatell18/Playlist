<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\PopularTopicsController;

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
    return view('layouts.main');
});


// Route::get('/', function () {
//     if(Auth::user())
//     {
//         return view('layouts.main');
//     }
//     return redirect()->route('login');
// });
Route::get('/login', [HomeController::class, 'Login'])->name('login');
Route::post('/loginstore', [HomeController::class, 'loginStore'])->name('loginstore');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/logout',[HomeController::class,'Logout'])->name('logout');

// Category

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
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
