<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Mail\MailController;

Route::get('/', [BlogController::class,'index'])->name('home');
Route::get('/Article/{id}', [BlogController::class,'showArt'])->name('showArt');
Route::get('/register',[AuthController::class,'ShowSingUp'])->name('register');
Route::post('/register',[AuthController::class,'SignUp'])->name('registration.register');
Route::get('/login',[AuthController::class,'ShowForLOGIN'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('registration.login');
Route::post('/logout',[AuthController::class,'lougout'])->name('logout'); 
Route::get('/create',[BlogController::class,'ReadCategory'])->name('create')->middleware('auth');
Route::post('/create',[BlogController::class,'CreateArticale'])->name('create.store')->middleware('auth');
Route::get('/dashboard',[BlogController::class,'dashboardarticles'])->name('dashboard')->middleware('auth');
Route::get('/article/{id}/edit',[BlogController::class,'dashboardarticlesingle'])->name('article.edit')->middleware('auth');
Route::put('/article/{id}',[BlogController::class,'update'])->name('article.update')->middleware('auth');
Route::delete('/delete/{id}',[BlogController::class,'destroy'])->name('article.destroy')->middleware('auth');
Route::get('/Contact',[ContactController::class,'showMailForm'])->name('MailForm');
Route::post('/Contact',[ContactController::class,'Send'])->name('SentMail');
