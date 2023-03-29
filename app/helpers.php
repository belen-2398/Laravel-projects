<?php

use Illuminate\Support\Facades\Route;

function urlIs($value)
{
    $action = request()->route()->getAction();
    if (isset($action['controller'])) {
        $controller = $action['controller'];
        $controllerName = class_basename($controller);
        return str_contains($controllerName, $value);
    }
    return false;
}

function bgColor()
{
    switch (Route::currentRouteName()) {
        case 'home':
            return 'green';
        case 'about':
            return 'pink';
        case 'notes.index':
        case 'notes.create':
        case 'notes.edit':
        case 'notes.show':
        case 'notes.form':
            return 'yellow';
        case 'contact':
            return 'blue';
        default:
            return 'purple';
    }
}

function noteBgColor($index)
{
    $colors = ['green', 'pink', 'blue', 'yellow'];
    return $colors[$index % count($colors)];
}
