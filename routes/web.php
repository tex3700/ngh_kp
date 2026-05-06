<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QrController;
use Illuminate\Support\Facades\Route;

// Главная страница
Route::get('/', [HomeController::class, 'index'])->name('home');

// Каталог и QR-генератор (должны быть ДО динамического {slug})
Route::get('/products/catalog', [CatalogController::class, 'index'])->name('catalog');
Route::get('/products/qr-generate', [QrController::class, 'index'])->name('qr.generate');
Route::get('/products/qr-generate/check-url', [QrController::class, 'checkUrl'])->name('qr.check-url');

// Страница продукта (динамический slug)
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('product.show');

// Контактная форма
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
