<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
  
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
});

Route::get('/', ['App\Http\Controllers\Public\HomeController', 'index'])->name('home');
Route::get('/recursos/{resource}', ['App\Http\Controllers\Public\HomeController', 'show'])->name('resources.show');

Route::get('login', ['App\Http\Controllers\Auth\LoginController', 'showLoginForm'])->name('login');
Route::post('login', ['App\Http\Controllers\Auth\LoginController', 'login']);
Route::post('logout', ['App\Http\Controllers\Auth\LoginController', 'logout'])->name('logout');
