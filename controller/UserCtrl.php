<?php

namespace Controller;

use Database;

class UserCtrl extends BaseCtrl{
    static public function usersView(){
        $request = self::$request;
        
        if (isset($request['page'])) {
            $page = $request['page'];
            $skip = ($request['page'] - 1) * 5;
        } else {
            $page = 1;
            $skip = 0 * 5;
        }


        $users = Database::rawSql("SELECT * FROM users LIMIT $skip,5");
        $totalPage = count(Database::rawSql("SELECT * FROM users"));


        return BaseCtrl::render("/views/usersView.php", [
            "pageTitle" => "Users",
            "users" => $users,
            "currentPage" => $page,
            "totalPage" => $totalPage
        ]);
    }

    static public function createUser(){
        $request = self::$request;
        $files = self::$files;

        if ($files['photo']['name'] != "") {
            $photo = $files['photo'];
            $upload = self::upload($photo, $request['username']);
            $path = $upload['path'];
        } else {
            $path = "./assets/img/guest.png";
        }

        $now = date("Y-m-d H:i:s");
        $username = $request['username'];
        $name = $request['name'];
        $password = "123";

        $users = Database::runSql("INSERT INTO users(create_time,name,photo,password,username) VALUES('$now','$name','$path','$password','$username')");

        return self::redirect("users");
    }
}