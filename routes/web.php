<?php

use App\Http\Controllers\back\BackHomeController;
use App\Http\Controllers\back\FilmController;
use App\Http\Controllers\back\CategoryController;
use App\Http\Controllers\back\Prozes;
use App\Http\Controllers\back\UserController;
use App\Models\Film;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>['isAdmin']],function(){

    Route::get('/',[BackHomeController::class,'index'])->name('index');

    Route::get('film/silinenler',[FilmController::class,'trashed'])->name('trashed.film');

    Route::get('kotegori/silinenler',[CategoryController::class,'trashed'])->name('trashed.category');


    Route::get('/logout',[BackHomeController::class,'logout'])->name('logout');


    Route::resource('kategori', CategoryController::class);
    Route::resource('film', FilmController::class);
    Route::get('sil/{id}',[FilmController::class,'delete'])->name('delete.film');

    Route::get('kategorisil/{id}',[CategoryController::class,'delete'])->name('delete.kategori');


    Route::get('tamsil/{id}',[FilmController::class,'harddelete'])->name('hardDelete.film');


    Route::get('tamkategorisil/{id}',[CategoryController::class,'harddelete'])->name('hardDelete.kategori');


    Route::get('filmkurtar/{id}',[FilmController::class,'recover'])->name('recover.film');
    Route::get('kategorikurtar/{id}',[CategoryController::class,'recover'])->name('recover.kategori');

    Route::get('filmkatagori/{id}',[FilmController::class,'filmcategory'])->name('film.category');

    Route::get('filmkategorisil/{id}',[FilmController::class,'filmkategoridelete'])->name('delete.filmcategory');

    Route::get('filmkategoriekle/{id}',[FilmController::class,'filmkategoriedit'])->name('filmkategoriedit');


    Route::post('filmkategoriekleislemi',[FilmController::class,'filmkategoristore'])->name('filmcategorystore');


    Route::resource('kullanici', UserController::class);

    Route::get('sifre',[BackHomeController::class,'passwordchange'])->name('passwordchange');

    Route::post('sifre',[BackHomeController::class,'passwordchangestore'])->name('passwordchange');


});

Route::group(['middleware'=>['isLogin']],function(){

    Route::get('kayitol',[BackHomeController::class,'register'])->name('register');

    Route::get('/login',[BackHomeController::class,'login'])->name('login');

    Route::post('/login',[BackHomeController::class,'loginPost'])->name('login.post');

    Route::post('/register',[BackHomeController::class,'registerPost'])->name('register.post');

});
