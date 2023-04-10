<?php

function custom_autoloader($class) {
    $class=str_replace('\\','/',$class);
    include_once __DIR__ . '/' .$class . '.php';
}
spl_autoload_register('custom_autoloader');