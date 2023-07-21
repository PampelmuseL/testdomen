<?php

function route(string $url, Closure $callback): array
{
    $url = trim($url, '/');
    $route[$url]['callback'] = $callback;

    return $route;
}

function dispatch(string $method, string $url, array $routes): void
{
    $url = trim($url, '/');
    if (!array_key_exists($url, $routes[$method])) {
        echo "Ошибка 404. Такой страницы не существует!";

        return;
    }

    $callback = $routes[$method][$url]['callback'];

    echo call_user_func($callback);
}
