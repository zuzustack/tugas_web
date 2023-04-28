<?php

namespace Controller;

class BaseCtrl{
    static public $request, $files;
    static public $path_assets = __DIR__ . "/../assets/img/";

    static protected function render($path, $data = []) {
        extract($data);
        include_once(__DIR__ ."/.." . "/partials/header.php");
        include_once(__DIR__ ."/.." .$path);
        include_once(__DIR__ ."/.." ."/partials/footer.php");
    }


    static protected function redirect($path) {
        header("Location: /?$path");
    }

    static protected function upload($photo, $opt = "") {
        $status = move_uploaded_file($photo['tmp_name'], self::$path_assets . $opt . "-" . $photo['name']);
        return [
            'status' => $status,
            'path' => "./assets/img/" . $opt . "-" .  $photo['name']
        ];
    }
}