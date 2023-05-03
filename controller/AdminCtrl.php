<?php

namespace Controller;

use Database;

class AdminCtrl extends BaseCtrl{
    static public function adminView(){
        $request = self::$request;
        
        if (isset($request['page'])) {
            $page = $request['page'];
            $skip = ($request['page'] - 1) * 5;
        } else {
            $page = 1;
            $skip = 0 * 5;
        }


        $users = Database::rawSql("SELECT * FROM users WHERE is_admin = 1 LIMIT $skip,5");
        $totalPage = count(Database::rawSql("SELECT * FROM users WHERE is_admin = 1"));


        return BaseCtrl::render("/views/adminView.php", [
            "pageTitle" => "Admin",
            "users" => $users,
            "currentPage" => $page,
            "totalPage" => $totalPage
        ]);
    }

    static public function createAdmin(){
        $request = self::$request;
        $files = self::$files;

        if ($files['photo']['name'] != "") {
            $photo = $files['photo'];
            $upload = self::upload($photo,'img/', $request['username']);

            $path = $upload['path'];
        } else {
            $path = "./assets/img/guest.png";
        }



        $now = date("Y-m-d H:i:s");
        $username = $request['username'];
        $name = $request['name'];
        $password = "123";

        $users = Database::runSql("INSERT INTO users(create_time,name,photo,password,username,is_admin) VALUES('$now','$name','$path','$password','$username', 1)");

        return self::redirect("admin");
    }
    


    static public function editAdmin(){
        $request = self::$request;
        $files = self::$files;


        $id = $request['id'];
        $user = Database::rawSql("SELECT * FROM users WHERE id = $id")[0];
        

        // Username
        if ($request['username'] != $user['username']) {
            $username = $request['username'];
        } else {
            $username = $user['username'];
        }

        // Name
        if ($request['name'] != $user['name']) {
            $name = $request['name'];
        } else {
            $name = $user['name'];
        }


        // password
        if (isset($request['password']) && $request['password'] != "") {
            $password = $request['password'];
        } else {
            $password = $user['password'];
        }


        // photo
        if ($files['photo']['name'] != "") {
            $photo = $files['photo'];
            $upload = self::upload($photo,'img/', $request['username']);
            $path = $upload['path'];
        } else {
            $path = $user['photo'];
        }

        $users = Database::runSql("UPDATE users SET name='$name',password='$password',username='$username',photo='$path' WHERE `id`=$id;");


        return self::redirect("admin");
    }


    static public function deleteAdmin(){
        $request = self::$request;

        $id = $request['id'];

        $users = Database::runSql("DELETE FROM `users` WHERE `id`=$id");

        return self::redirect("admin");
    }

}