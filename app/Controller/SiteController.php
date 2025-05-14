<?php

namespace Controller;

use Src\View;

class SiteController
{
    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }

    public function counting(): string
    {
        return new View('site.counting', ['message' => 'hello working']);
    }

    public function countingTwo(): string
    {
        return new View('site.countingtwo', ['message' => 'hello working']);
    }

    public function countingThree(): string
    {
        return new View('site.countingthree', ['message' => 'hello working']);
    }
}