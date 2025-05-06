<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;

class DekanatMiddleware
{
    public function handle(Request $request)
    {
        // Если пользователь не авторизован или не сотрудник деканата - редирект
        if (!Auth::check() || !Auth::isDekanat()) {
            app()->route->redirect('/hello');
        }
    }
}