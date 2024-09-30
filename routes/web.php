<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('front');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

//CONVENTIONS
Route::get('/conventions', [DashboardController::class, 'conventions'])->name('conventions.index');
Route::get('/conventions/add', [DashboardController::class, 'conventionsAdd'])->name('conventions.add');
Route::post('conventions', [DashboardController::class, 'conventionsStore'])->name('conventions.store');
Route::get('conventions/{convention}/edit', [DashboardController::class, 'conventionsEdit'])->name('conventions.edit');
Route::put('conventions/{convention}', [DashboardController::class, 'conventionsUpdate'])->name('conventions.update');
Route::delete('conventions/{convention}', [DashboardController::class, 'conventionsDestroy'])->name('conventions.destroy');
Route::get('conventions/{convention}', [DashboardController::class, 'conventionsShow'])->name('conventions.show');

//CATEGORIES
Route::get('/categories', [DashboardController::class, 'categories'])->name('categories.index');
Route::get('/categories/add', [DashboardController::class, 'categoriesAdd'])->name('categories.add');
Route::post('/categories', [DashboardController::class, 'categoriesStore'])->name('categories.store');
Route::get('categories/{category}/edit', [DashboardController::class, 'categoriesEdit'])->name('categories.edit');
Route::put('categories/{category}', [DashboardController::class, 'categoriesUpdate'])->name('categories.update');
Route::delete('categories/{category}', [DashboardController::class, 'categoriesDestroy'])->name('categories.destroy');

//FOURNISSEURS
Route::get('/fournisseurs', [DashboardController::class, 'fournisseurs'])->name('fournisseurs.index');
Route::get('/fournisseurs/add', [DashboardController::class, 'fournisseursAdd'])->name('fournisseurs.add');
Route::post('/fournisseurs', [DashboardController::class, 'fournisseursStore'])->name('fournisseurs.store');
Route::get('fournisseurs/{fournisseur}/edit', [DashboardController::class, 'fournisseursEdit'])->name('fournisseurs.edit');
Route::put('fournisseurs/{fournisseur}', [DashboardController::class, 'fournisseursUpdate'])->name('fournisseurs.update');
Route::delete('fournisseurs/{fournisseur}', [DashboardController::class, 'fournisseursDestroy'])->name('fournisseurs.destroy');

//DIRECTIONS
Route::get('/directions', [DashboardController::class, 'directions'])->name('directions.index');
Route::get('/directions/add', [DashboardController::class, 'directionsAdd'])->name('directions.add');
Route::post('/directions', [DashboardController::class, 'directionsStore'])->name('directions.store');
Route::get('directions/{direction}/edit', [DashboardController::class, 'directionsEdit'])->name('directions.edit');
Route::put('directions/{direction}', [DashboardController::class, 'directionsUpdate'])->name('directions.update');
Route::delete('directions/{direction}', [DashboardController::class, 'directionsDestroy'])->name('directions.destroy');

//MATERIEL
Route::get('/materiel', [DashboardController::class, 'materiels'])->name('materiels.index');

//TYPEVOITURE
Route::get('/typesvoitures', [DashboardController::class, 'typesvoitures'])->name('typesvoitures.index');
Route::get('/typesvoitures/add', [DashboardController::class, 'typesvoituresAdd'])->name('typesvoitures.add');
Route::post('/typesvoitures', [DashboardController::class, 'typesvoituresStore'])->name('typesvoitures.store');
Route::get('typesvoitures/{typesvoitures}/edit', [DashboardController::class, 'typesvoituresEdit'])->name('typesvoitures.edit');
Route::put('typesvoitures/{typesvoitures}', [DashboardController::class, 'typesvoituresUpdate'])->name('typesvoitures.update');
Route::delete('typesvoitures/{typesvoitures}', [DashboardController::class, 'typesvoituresDestroy'])->name('typesvoitures.destroy');

//VILLES
Route::get('/cities', [DashboardController::class, 'cities'])->name('city.index');
Route::get('/cities/add', [DashboardController::class, 'citiesAdd'])->name('cities.add');
Route::post('/cities', [DashboardController::class, 'citiesStore'])->name('cities.store');
Route::get('cities/{city}/edit', [DashboardController::class, 'citiesEdit'])->name('cities.edit');
Route::put('cities/{city}', [DashboardController::class, 'citiesUpdate'])->name('cities.update');
Route::delete('cities/{city}', [DashboardController::class, 'citiesDestroy'])->name('cities.destroy');

//ARTICLES
Route::get('/articles', [DashboardController::class, 'articles'])->name('articles.index');
Route::get('/articles/add', [DashboardController::class, 'articlesAdd'])->name('articles.add');
Route::post('/articles', [DashboardController::class, 'articlesStore'])->name('articles.store');
Route::get('articles/{articles}/edit', [DashboardController::class, 'articlesEdit'])->name('articles.edit');
Route::put('articles/{articles}', [DashboardController::class, 'articlesUpdate'])->name('articles.update');
Route::delete('articles/{articles}', [DashboardController::class, 'articlesDestroy'])->name('articles.destroy');

//STOCK
Route::get('/stock/entrer', [DashboardController::class, 'showEntrerForm'])->name('stock.entrer.index');
Route::post('/stock/entrer', [DashboardController::class, 'entrer'])->name('stock.entrer');
Route::post('/stock/sortir', [DashboardController::class, 'sortir'])->name('stock.sortir');

