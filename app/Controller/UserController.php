<?php

namespace Controller;

use Model\User;
use Src\View;
use Src\Request;
use Src\Auth\Auth;

class UserController
{
    public function addStaff(Request $request): string
    {
        if ($request->method === 'POST') {
            try {
                $user = User::create([
                    'last_name' => $request->last_name,
                    'first_name' => $request->first_name,
                    'patronymic' => $request->patronymic ?? null,
                    'login' => $request->login,
                    'password' => $request->password,
                    'role' => $request->role
                ]);

                $message = 'Сотрудник успешно добавлен!';
            } catch (\Exception $e) {
                $message = 'Ошибка при добавлении: ' . $e->getMessage();
            }
        }

        return new View('site.add_staff', ['message' => $message ?? '']);
    }

    public function login(Request $request): string
    {
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/hello');
        }
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }
    public function staff(Request $request): string
    {
        $users = User::where('role', '=', 'staff_dekanat')->get();
        return new View('site.staff', [
            'users' => $users
        ]);
    }
}