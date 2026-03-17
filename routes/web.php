<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Public\LangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:web'], function () {

  Route::get('/panel-de-control', function () {
    return view('admin.dashboard.index');
  })->name('dashboard');
  
  Route::resource('usuarios', 'App\Http\Controllers\Admin\UserController', [
    'parameters' => [
      'usuarios' => 'user',
    ],
    'names' => [
      'index' => 'users',
      'create' => 'users_create',
      'edit' => 'users_edit',
      'store' => 'users_store',
      'destroy' => 'users_destroy',
    ]
  ]);

  Route::resource('clientes', 'App\Http\Controllers\Admin\CustomerController', [
    'parameters' => [
      'clientes' => 'customer',
    ],
    'names' => [
      'index' => 'customers',
      'create' => 'customers_create',
      'edit' => 'customers_edit',
      'store' => 'customers_store',
      'destroy' => 'customers_destroy',
    ]
  ]);

  Route::resource('tags', 'App\Http\Controllers\Admin\TagController', [
    'parameters' => [
      'tags' => 'tag',
    ],
    'names' => [
      'index' => 'tags',
      'create' => 'tags_create',
      'edit' => 'tags_edit',
      'store' => 'tags_store',
      'destroy' => 'tags_destroy',
    ]
  ]);

  Route::resource('plataformas', 'App\Http\Controllers\Admin\PlatformController', [
    'parameters' => [
      'plataformas' => 'platform',
    ],
    'names' => [
      'index' => 'platforms',
      'create' => 'platforms_create',
      'edit' => 'platforms_edit',
      'store' => 'platforms_store',
      'destroy' => 'platforms_destroy',
    ]
  ]);

  Route::resource('recursos', 'App\Http\Controllers\Admin\ResourceController', [
    'parameters' => [
      'recursos' => 'resource',
    ],
    'names' => [
      'index' => 'resources',
      'create' => 'resources_create',
      'edit' => 'resources_edit',
      'store' => 'resources_store',
      'destroy' => 'resources_destroy',
    ]
  ]);

  Route::post('/images', 'App\Http\Controllers\Admin\ImageController@store')->name('images_store');
  Route::get('/images/thumb/{filename}', 'App\Http\Controllers\Admin\ImageController@showThumb')->name('images_thumb');
  Route::delete('/images/{filename}', 'App\Http\Controllers\Admin\ImageController@destroy')->name('images_destroy');
});

Route::group(['prefix' => 'cuenta', 'middleware' => 'auth:customer'], function () {
  Route::get('/panel-de-control', function () {
    return view('customer.dashboard.index');
  })->name('customer-dashboard');
});

Route::get('/', function () {})->middleware('setlocale');
Route::post('/change-lang', 'App\Http\Controllers\Public\LangController@changeLang')->name('change-lang');

Route::group(['middleware' => 'sitemap'], function () {
  Route::get('/es', 'App\Http\Controllers\Public\HomeController@index')->name('es.home');
  Route::get('/es/juegos/{title}', 'App\Http\Controllers\Public\ResourceController@show')->name('es.resource');

  Route::get('/ca', 'App\Http\Controllers\Public\HomeController@index')->name('ca.home');
  Route::get('/ca/jocs/{title}', 'App\Http\Controllers\Public\ResourceController@show')->name('ca.resource');

  Route::get('/en', 'App\Http\Controllers\Public\HomeController@index')->name('en.home');
  Route::get('/en/games/{title}', 'App\Http\Controllers\Public\ResourceController@show')->name('en.resource');
});

require __DIR__.'/auth.php';
require __DIR__.'/auth-customer.php';

