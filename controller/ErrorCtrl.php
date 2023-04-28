<?php 
namespace Controller;
class ErrorCtrl extends BaseCtrl{
    static public function notFound(){
        BaseCtrl::render("/views/error/404.php", [
            'pageTitle' => "Not Found Page"
        ]);
    }


    static public function methodNotFound($nameMethod){
        BaseCtrl::render("/views/error/methodNotFound.php", [
            'pageTitle' => "Method Not Found",
            'error' => $nameMethod
        ]);
    }

    static public function errorDatabase($error){
        BaseCtrl::render("/views/error/methodNotFound.php", [
            'pageTitle' => "Database Error",
            'error' => $error
        ]);
    }
}