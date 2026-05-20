<?php

namespace app\Core;

class View {
    public static function view(string $path, array $data = []) : void
    {
        $absolutePath = __DIR__ . '/../../' . $path;

        if (file_exists($absolutePath)) {
            require $absolutePath;
        } else {
            die("Шаблон с адресом {$absolutePath} не найден");
        }
    }
}