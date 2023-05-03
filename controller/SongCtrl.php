<?php

namespace Controller;

use Database;

class SongCtrl extends BaseCtrl{
    static public function songView(){
        $request = self::$request;

        if (isset($request['page'])) {
            $page = $request['page'];
            $skip = ($request['page'] - 1) * 5;
        } else {
            $page = 1;
            $skip = 0 * 5;
        }


        $songs = Database::rawSql("SELECT * FROM songs LIMIT $skip,5");
        $totalPage = count(Database::rawSql("SELECT * FROM songs "));


        return BaseCtrl::render("/views/songManagement.php", [
            "pageTitle" => "Songs",
            "songs" => $songs,
            "currentPage" => $page,
            "totalPage" => $totalPage
        ]);
    }


    static public function createSong(){
        $request = self::$request;
        $files = self::$files;

        if ($files['music']['name'] != "") {
            $music = $files['music'];
            $upload = self::upload($music, "music/" ,$request['name']);
            $path = $upload['path'];
        }

        $now = date("Y-m-d H:i:s");
        $name = $request['name'];



        $users = Database::runSql("INSERT INTO songs(create_time,name,path,active) VALUES('$now','$name','$path',1);");

        return self::redirect("songs");

    }


    static public function editSong(){
        $request = self::$request;
        $files = self::$files;

        $id = $request['id'];
        $song = Database::rawSql("SELECT * FROM songs WHERE id = $id")[0];


        // Name
        if ($request['name'] != $song['name']) {
            $name = $request['name'];
        } else {
            $name = $song['name'];
        }


        // change music
        if ($files['music']['name'] != "") {
            $photo = $files['music'];
            $upload = self::upload($photo,"img/", $name);
            $path = $upload['path'];
        } else {
            $path = $song['path'];
        }


        $users = Database::runSql("UPDATE songs SET name='$name',path='$path' WHERE `id`=$id;");

        return self::redirect("songs");

    }


    static public function deleteSong(){
        $request = self::$request;

        $id = $request['id'];

        $users = Database::runSql("DELETE FROM `songs` WHERE `id`=$id");

        return self::redirect("songs");

    }

}
