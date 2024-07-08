<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/portfolios', [PortfolioController::class, 'apiindex'])->name('portfolio.index');

Route::get('/blogs', [BlogController::class, 'apiindex'])->name('blog.index');

Route::get('/services', [ServiceController::class, 'apiindex'])->name('service.index');
