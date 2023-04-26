<?php

namespace Controller;

use Database;

class UserCtrl extends BaseCtrl{
    static public function usersView(){
        $users = Database::rawSql("SELECT * FROM users");


        return BaseCtrl::render("/views/usersView.php", [
            "pageTitle" => "Users",
            "users" => $users
        ]);
    }
}