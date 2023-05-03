<?php

namespace Controller;

use Database;

class AuthCtrl extends BaseCtrl{
    static public function loginView(){
        return BaseCtrl::render("/views/loginView.php", [
            "pageTitle" => "Login"
        ]);
    }


    static public function loginLogic(){
        $request = self::$request;
        $username = $request['username'];
        $password = $request['password'];

        $user = Database::rawSql("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
        
        if (count($user) == 0) {
            return self::render("/views/loginView.php", [
                "pageTitle" => "Login",
                "error" => "Password atau username salah"
            ]);
        } 



        if ($user[0]['is_admin'] == 1) {
            $_SESSION['user'] = $user[0];
            return self::redirect("users");
        } else {
            $_SESSION['user'] = $user[0];
            return self::redirect("dashboard");
        }

    }

    static public function logoutLogic(){
        $_SESSION['user'] = null;
        return self::redirect("login");
    }
}