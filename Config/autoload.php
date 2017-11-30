<?php
//function __autoload($classname)
//{
////    var_dump($classname);die;
//    require    $_SERVER['DOCUMENT_ROOT'] . '/' .str_replace('\\', '/', $classname) . '.php';
//
//}
spl_autoload_register(function ($class_name) {
    $path = $_SERVER['DOCUMENT_ROOT'] . '/';
    $req_file = str_replace('\\', '/', $class_name) . '.php';
    if (file_exists($path . $req_file)) {
        require_once $path . $req_file;
    } else {
        die('File or Class not found');
    }
});