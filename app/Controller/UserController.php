<?php

namespace Controller;

use Model\User;
use Validators\Validator;
use Src\View;
use Src\Request;
use Src\Auth\Auth;
use Mashkinsa\ImageUploader\ImageUploader;
use Mashkinsa\ImageUploader\Exceptions\ImageUploadException;

class UserController
{
    public function addStaff(Request $request): string
    {
        if ($request->method === 'POST') {
            try {
                // Валидация данных
                $validator = new Validator($request->all(), [
                    'last_name' => ['required'],
                    'first_name' => ['required'],
                    'login' => ['required', 'unique:users,login'],
                    'password' => ['required', 'min:8'],
                ]);

                if ($validator->fails()) {
                    return new View('site.add_staff', [
                        'errors' => $validator->errors(),
                        'old' => $request->all()
                    ]);
                }

                // Обработка аватара
                $avatarPath = '/public/images/default-avatar.jpg';

                if (isset($_FILES['avatar'])){
                    $uploader = new ImageUploader();
                    try {
                        $filename = $uploader->upload(
                            $_FILES['avatar'],
                            $_SERVER['DOCUMENT_ROOT'] . '/public/images'
                        );
                        $avatarPath = '/public/images/' . $filename;
                    } catch (ImageUploadException $e) {
                        error_log('Image upload failed: ' . $e->getMessage());
                    }
                }

                // Создание пользователя
                User::create([
                    'last_name' => $request->last_name,
                    'first_name' => $request->first_name,
                    'patronymic' => $request->patronymic,
                    'login' => $request->login,
                    'password' => $request->password,
                    'avatar' => $avatarPath,
                    'role' => 'staff_dekanat'
                ]);

                app()->route->redirect('/staff');

            } catch (\Exception $e) {
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