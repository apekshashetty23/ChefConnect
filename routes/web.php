<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

// FRONTEND ROUTES
Route::get('/',[AdminController::class,'home'])->name('frontend.home');
Route::get('/about',[AdminController::class,'about'])->name('frontend.about');
Route::get('/contact',[AdminController::class,'contact'])->name('frontend.contact');
Route::get('/recipes',[AdminController::class,'recipes'])->name('frontend.recipes');
Route::get('/recipe/{id}',[AdminController::class,'viewRecipe'])->name('frontend.recipe.view');

// ✅ FIXED: PUBLIC FEEDBACK ROUTE
Route::post('/store-feedback',[AdminController::class,'storeFeedback'])->name('store-feedback');


// LOGIN ROUTES
Route::get('/login',[AdminController::class,'adminlogin'])->name('login');
Route::post('/login',[AdminController::class,'admin_login'])->name('admin.login.submit');
Route::post('/logout',[AdminController::class,'logout'])->name('admin.logout');


// ADMIN ROUTES (PROTECTED)
Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/add-recipe',[AdminController::class,'addrecipedashboard'])->name('admin.addrecipe');
    Route::post('/store-recipe',[AdminController::class,'storeRecipe'])->name('admin.storeRecipe');
    Route::get('/recipes',[AdminController::class,'viewrecipedashboard'])->name('admin.recipes');
    Route::get('/recipe/{id}',[AdminController::class,'viewRecipeAdmin'])->name('admin.recipe.view');
    Route::get('/recipe/{id}/edit',[AdminController::class,'editRecipe'])->name('admin.recipe.edit');
    Route::put('/recipe/{id}',[AdminController::class,'updateRecipe'])->name('admin.recipe.update');
    Route::delete('/recipe/{id}',[AdminController::class,'deleteRecipe'])->name('admin.recipe.delete');
    
    Route::get('/feedbacks',[AdminController::class,'viewFeedbacks'])->name('admin.feedbacks');
});