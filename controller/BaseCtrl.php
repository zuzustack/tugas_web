<?php

namespace Controller;

class BaseCtrl{
    static public $request;

    static protected function render($path, $data = []) {
        extract($data);
        include_once(__DIR__ ."/.." . "/partials/header.php");
        include_once(__DIR__ ."/.." .$path);
        include_once(__DIR__ ."/.." ."/partials/footer.php");
    }


    static protected function redirect($path) {
        header("Location: /?$path");
    }
}