<?php

namespace Controller;

use Model\Building;
use Model\Post;
use Model\RoomType;
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

        return new View('site.add_staff', ['message' => $message ?? '']);
    }

    public function add_building(Request $request): string
    {
        if ($request->method === 'POST') {
            try {
                $building = Building::create([
                    'name' => $request->name,
                    'address' => $request->address
                ]);

                $message = 'Здание успешно добавлено!';

            } catch (\Exception $e) {
                $message = 'Ошибка при добавлении здания: ' . $e->getMessage();
            }
        }

        return new View('site.add_building', ['message' => $message ?? '']);
    }

    public function add_room(Request $request): string
    {
        // Получаем все здания и типы помещений из БД
        $buildings = Building::all();
        $roomTypes = RoomType::all();

        if ($request->method === 'POST') {
            try {
                $room = Room::create([
                    'number' => $request->number,
                    'square' => $request->square,
                    'quantity' => $request->quantity ?? null,
                    'id_building' => $request->id_building,
                    'id_type' => $request->id_type
                ]);

                $message = 'Помещение успешно добавлено!';
            } catch (\Exception $e) {
                $message = 'Ошибка при добавлении помещения: ' . $e->getMessage();
            }
        }

        return new View('site.add_room', [
            'message' => $message ?? '',
            'buildings' => $buildings,
            'roomTypes' => $roomTypes
        ]);
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
    public function counting(): string
    {
        return new View('site.counting', ['message' => 'hello working']);
    }
    public function countingtwo(): string
    {
        return new View('site.countingtwo', ['message' => 'hello working']);
    }

    public function countingthree(): string
    {
        return new View('site.countingthree', ['message' => 'hello working']);
    }
}

