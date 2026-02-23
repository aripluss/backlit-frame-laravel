<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductPageController;
use App\Http\Controllers\ContactRequestFormController;

Route::get('/', function () {
    $popularDesignsItems = include base_path('data/popular-designs-items.php');

    return view('main', [
        'popularDesigns' => $popularDesignsItems,
    ]);
});

Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');

Route::get('/product/{id}', [ProductPageController::class, 'show'])->name('product.show');



Route::post('/contact-request', [ContactRequestFormController::class, 'submit'])
    ->name('contact.submit');