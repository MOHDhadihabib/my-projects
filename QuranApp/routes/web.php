<?php

use App\Http\Controllers\Quran;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});




Route::get("indexsurah/", [Quran::class, "getSurahIndex"]);
Route::get("indexread/{surahNum}", [Quran::class, "getSurahRead"]);

Route::get("indexjuz/", [Quran::class, "getJuzIndex"]);
Route::get("indexjuzread/{juzNum}", [Quran::class, "getJuzRead"]);
