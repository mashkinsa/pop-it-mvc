<?php

namespace Controller;

use Model\User;
use Validators\Validator;
use Src\View;
use Src\Request;
use Src\Auth\Auth;


class UserController
{
    public function addStaff(Request $request): string
    {
        if ($request->method === 'POST') {
            try {
                // Валидация
                $validator = new Validator($request->all(), [
                    'last_name' => ['required'],
                    'first_name' => ['required'],
                    'login' => ['required', 'unique:users,login'],
                    'password' => ['required', 'min:8'],
                    'avatar' => ['image']
                ]);

                if ($validator->fails()) {
                    return new View('site.add_staff', [
                        'errors' => $validator->errors(),
                        'old' => $request->all()
                    ]);
                }

                $avatarPath = '/public/images/default-avatar.jpg';
                //Проверка наличия и успешности загрузки файла
                if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                    // Получение информации о файле
                    $file = $_FILES['avatar'];
                    //Генерация уникального имени файла
                    $filename = uniqid() . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
                    //Определение пути для сохранения
                    $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/public/images/' . $filename;
                    //Перемещение файла из временной директории
                    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                        //Как он в базе данных будет
                        $avatarPath = '/public/images/' . $filename;
                    }
                }

                // Создание пользователя
                User::create([
                    'last_name' => $request->last_name,
                    'first_name' => $request->first_name,
                    'patronymic'=> $request->patronymic,
                    'login' => $request->login,
                    'password' => $request->password, // Хеширование в модели
                    'avatar' => $avatarPath
                ]);

                app()->route->redirect('/staff');

            } catch (Exception $e) {
                return new View('site.add_staff', [
                    'error' => 'Ошибка: ' . $e->getMessage(),
                    'old' => $request->all()
                ]);
            }
        }

        return new View('site.add_staff');
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