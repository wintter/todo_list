<?php
spl_autoload_register(function ($class) {
    if (strpos($class, "\\") !== false) {
        $path = explode("\\", $class);
        $filePath = implode('/', $path);
        include $filePath . '.php';
    } else {
            include __DIR__ . '/core/classes/' . $class . '.php';
    }
});