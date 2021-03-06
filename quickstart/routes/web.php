<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\App;

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

Route::get('/', [CollectionController::class, 'index'])->name('home');

Route::get('/locale/{locale}', [LocaleController::class, 'getLocale'])->name('locale');

Route::resources([
    'collections' => CollectionController::class,
    'words' => WordController::class,
]);

Route::post('collections/{collection}/attach/{word}', [CollectionController::class, 'attach'])->name('collections.attach');
Route::delete('collections/{collection}/detach/{word}', [CollectionController::class, 'detach'])->name('collections.detach');
