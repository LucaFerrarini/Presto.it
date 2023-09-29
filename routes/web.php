<?php

use App\Models\Announcement;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;

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

Route::get('/', [PublicController::class, 'homepage'])->name('home');

Route::get('/register', [PublicController::class, 'register'])->name('register');

Route::get('/login', [PublicController::class, 'login'])->name('login');



Route::get('/nuovo/annuncio',[AnnouncementController::class, 'createAnnouncement'])->middleware('auth')->name('announcement.create');

//Userstory 2 
Route::get('/',[FrontController::class, 'welcome'])->name('welcome');

Route::get('/categoria/{category}',[FrontController::class, 'categoryShow'])->name('categoryShow');

Route::get('/dettaglio/annuncio{announcement}',[AnnouncementController::class, 'showAnnouncement'])->name('announcements.show');

Route::get('/indice/annunci',[AnnouncementController::class, 'indexAnnouncement'])->name('announcement.index');

// home revisor
Route::get('/revisor/home',[RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');

// Accetta Annuncio con Patch andiamo a modificare un campo specifico dentro la riga della nostra DB (una modifica singola) 
Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class,'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');

// Rifiuta Annuncio
Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class,'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');

// Diventa revisore
Route::get('/revisor/work', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become-revisor');

// Rendi revisore
Route::get('/rendi/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

Route::get('/register/revisor', [RevisorController::class, 'registerRevisor'])->name('register.revisor');

// ricerca annuncio

Route::get('/ricerca/annuncio', [FrontController::class, 'searchAnnouncements'])->name('announcements.search');

// Cambio Lingua
Route::post('/lingua/{lang}', [FrontController::class, 'setLanguage'] )->name('setLocale');