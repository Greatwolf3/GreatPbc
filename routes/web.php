<?php


use App\Http\Middleware\AdminRole;
use App\Http\Middleware\UserRole;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\GameController;
use App\Models\Mappa;
Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::get('/', function () {
        return view('welcome');
    })->name('home');



        Route::get('/game',  [GameController::class, 'game'])->name('game_index');




    Route::get('/regolamento', function () {
        return view('regolamento');
    })->name('regolamento');
    Route::get('/ambientazione', function () {
        return view('ambientazione');
    })->name('ambientazione');
    Route::get('/contatti', function () {
        return view('contatti');
    })->name('contatti');

//Route::post('/auth/logout', [CommonController::class, 'logout'])->name('filament.admin.auth.logout');
Route::get('/api/connected-users', [CommonController::class, 'getConnectedUsers']);
Route::get('api/carousel',[CommonController::class, 'getCarousel'])->name('getCarousel');
});

/*
Route::middleware([AdminRole::class])->group(function () {

});  */