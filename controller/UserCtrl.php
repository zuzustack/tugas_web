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


        $users = Database::rawSql("SELECT * FROM users WHERE is_admin = 0 LIMIT $skip,5");
        $totalPage = count(Database::rawSql("SELECT * FROM users WHERE is_admin = 0"));


        return BaseCtrl::render("/views/usersView.php", [
            "pageTitle" => "Users",
            "users" => $users,
            "currentPage" => $page,
            "totalPage" => $totalPage
        ]);
    }


    static public function deleteUser(){
        $request = self::$request;

        $id = $request['id'];

        $users = Database::runSql("DELETE FROM `users` WHERE `id`=$id");

        return self::redirect("users");
    }

    static public function createUser(){
        $request = self::$request;
        $files = self::$files;


        if ($files['photo']['name'] != "") {
            $photo = $files['photo'];
            $upload = self::upload($photo,"img/", $request['username']);
            $path = $upload['path'];
        } else {
            $path = "./assets/img/guest.png";
        }

        $now = date("Y-m-d H:i:s");
        $username = $request['username'];
        $name = $request['name'];
        $password = password_hash($request['password'],PASSWORD_BCRYPT);

        Database::runSql("INSERT INTO users(create_time,name,photo,password,username,is_admin) VALUES('$now','$name','$path','$password','$username', 0)");



        return self::redirectWith("login", [
            "success" => "Success Create User"
        ]);
    }


    static public function editUser(){
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
            $password = password_hash($request['password'],PASSWORD_BCRYPT);
        } else {
            $password = $user['password'];
        }


        // photo
        if ($files['photo']['name'] != "") {
            $photo = $files['photo'];
            $upload = self::upload($photo,"img/", $username);
            $path = $upload['path'];
        } else {
            $path = $user['photo'];
        }

        $users = Database::runSql("UPDATE users SET name='$name',password='$password',username='$username',photo='$path' WHERE `id`=$id;");

        if ($id == $_SESSION['user']['id']) {
            $user = Database::rawSql("SELECT * FROM users WHERE username = '$username'");
            
            $_SESSION['user'] = $user[0];
        }

        return self::redirect("users");
    }

}