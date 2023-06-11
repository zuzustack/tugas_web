<?php

namespace Controller;

use Database;

class HomeCtrl extends BaseCtrl{
    static public function dashboardView(){
        $request = self::$request;

        if (isset($request['page'])) {
            $page = $request['page'];
            $skip = ($request['page'] - 1) * 5;
        } else {
            $page = 1;
            $skip = 0 * 5;
        }

        $songs = Database::rawSql("SELECT * FROM songs LIMIT $skip,5");


        return BaseCtrl::render("/views/dashboardView.php", [
            "pageTitle" => "Dashboard",
            "songs" => $songs
        ]);
    }


    static public function profileView(){
        return BaseCtrl::render("/views/profileView.php", [
            "pageTitle" => "Profile",
            "auth" => $_SESSION['user']
        ]);
    }
}