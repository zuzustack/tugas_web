<?php

namespace Controller;

class BaseCtrl{
    static public $request, $files;
    static public $path_assets = __DIR__ . "/../assets/";
    static public $publict_assets = __DIR__ . "./assets/";


    static protected function render($path, $data = []) {
        extract($data);
        extract($_SESSION['with']);
        include_once(__DIR__ ."/.." . "/partials/header.php");
        include_once(__DIR__ ."/.." .$path);
        include_once(__DIR__ ."/.." ."/partials/footer.php");
        $_SESSION['with'] = []; 
    }


    static protected function redirect($path) {
        header("Location: /?$path");
    }

    static protected function redirectWith($path, $data=[]) {
        $_SESSION['with'] = $data;
        header("Location: /?$path");
    }

    static protected function upload($photo, $type ,$opt = "") {
        $status = move_uploaded_file($photo['tmp_name'], self::$path_assets . $type . $opt . "-" . $photo['name']);
        return [
            'status' => $status,
            'path' => "./assets/". $type . $opt . "-" .  $photo['name']
        ];
    }
}