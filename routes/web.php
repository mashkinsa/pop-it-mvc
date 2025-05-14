<?php

use Src\Route;

// Основные маршруты
Route::add('GET', '/hello', [Controller\SiteController::class, 'hello'])->middleware('auth');
Route::add(['GET', 'POST'], '/login', [Controller\UserController::class, 'login']);
Route::add('GET', '/logout', [Controller\UserController::class, 'logout']);

// Маршруты для работы с пользователями (только для админа)
Route::add(['GET', 'POST'], '/add_staff', [Controller\UserController::class, 'addStaff'])->middleware('admin');
Route::add('GET', '/staff', [Controller\UserController::class, 'staff'])->middleware('admin');

// Маршруты для работы с помещениями
Route::add(['GET', 'POST'], '/add_room', [Controller\RoomController::class, 'addRoom'])->middleware('staff_dekanat');
Route::add(['GET', 'POST'], '/add_building', [Controller\BuildingController::class, 'addBuilding'])->middleware('staff_dekanat');

// Маршруты для отчетов
Route::add('GET', '/area', [Controller\ReportController::class, 'areaReport'])->middleware('staff_dekanat');
Route::add('GET', '/seats', [Controller\ReportController::class, 'seatsReport'])->middleware('staff_dekanat');
Route::add('GET', '/choice', [Controller\ReportController::class, 'choiceReport'])->middleware('staff_dekanat');


