<?php

namespace Controller;

use Model\Building;
use Model\Post;
use Src\View;
use Src\Request;
use Model\User;
use Model\Room;
use Src\Auth\Auth;

class Site
{
    //public function index(Request $request): string
    //{
        //$posts = Post::where('id', $request->id)->get();
        //return (new View())->render('site.post', ['posts' => $posts]);
    //}

    public function index(): string
    {
        $posts = Post::all();
        return (new View())->render('site.post', ['posts' => $posts]);
    }

    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }

    public function add_staff(Request $request): string
    {
        if ($request->method === 'POST') {
            try {
                $user = User::create([
                    'last_name' => $request->last_name,
                    'first_name' => $request->first_name,
                    'patronymic' => $request->patronymic ?? null,
                    'login' => $request->login,
                    'password' => $request->password, // Автоматически хешируется в модели
                    'role' => $request->role
                ]);

                $message = 'Сотрудник успешно добавлен!';
            } catch (\Exception $e) {
                $message = 'Ошибка при добавлении: ' . $e->getMessage();
            }
        }

        return new View('site.add_staff');
    }


    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/hello');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }
}

