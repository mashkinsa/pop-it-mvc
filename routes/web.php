<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/add_staff', [Controller\Site::class, 'add_staff'])->middleware('admin');
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);;
Route::add('GET', '/couting', [Controller\Site::class, 'counting']);;
Route::add('GET', '/countingtwo', [Controller\Site::class, 'countingtwo']);;
Route::add('GET', '/countingthree', [Controller\Site::class, 'countingthree']);;
Route::add(['GET', 'POST'], '/add_room', [Controller\Site::class, 'add_room']) ->middleware('staff_dekanat');
Route::add(['GET', 'POST'], '/add_building', [Controller\Site::class, 'add_building']) ->middleware('staff_dekanat');