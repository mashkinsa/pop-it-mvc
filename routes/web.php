<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/add_staff', [Controller\Site::class, 'add_staff'])->middleware('admin');
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);;
Route::add(['GET', 'POST'], '/room', [Controller\Site::class, 'room']) ->middleware('staff_dekanat');
Route::add(['GET', 'POST'], '/building', [Controller\Site::class, 'building'])->middleware('staff_dekanat');
