<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;

class AdminMiddleware
{
    public function handle(Request $request)
    {
        // Если пользователь не авторизован или не админ - редирект
        if (!Auth::check() || !Auth::isAdmin()) {
            app()->route->redirect('/hello');
        }
    }
}