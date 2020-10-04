<?php

spl_autoload_register(function ($class){
    $prefix = 'bd';
    $base_dir = __DIR__ . '/model/bd';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        include_once $file;
    }
});

spl_autoload_register(function ($class){
    $prefix = 'classes';
    $base_dir = __DIR__ . '/model/classes';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        include_once $file;
    }
});

spl_autoload_register(function ($class){
    $prefix = 'controller';
    $base_dir = __DIR__ . '/controller';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        include_once $file;
    }
});

spl_autoload_register(function ($class){
    $prefix = 'dao';
    $base_dir = __DIR__ . '/model/dao';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        include_once $file;
    }
});