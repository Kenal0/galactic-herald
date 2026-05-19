<?php

namespace app\Core;

class View {
    public static function view(string $path, array $data = []) : void
    {
        if (file_exists($path)) {
            require $path;
        } else {
            die("Шаблон с адресом {$path} не найден");
        }
    }
}