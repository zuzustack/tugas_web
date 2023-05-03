<?php

use Controller\AuthCtrl;

$AuthCtrl = '\Controller\AuthCtrl';
$AdminCtrl = '\Controller\AdminCtrl';
$ErrorCtrl = '\Controller\ErrorCtrl';
$HomeCtrl = '\Controller\HomeCtrl';
$UserCtrl = '\Controller\UserCtrl';
$SongCtrl = '\Controller\SongCtrl';


$routes = array(
    // LOGIN
    // Format
    // "path.methods => classController:function?middleware" 
    // Default Middleware guest

    "login.get" => $AuthCtrl.":loginView?guest",
    "login.post" => $AuthCtrl.":loginLogic?guest",
    "logout.get" => $AuthCtrl.":logoutLogic?login",


    // Dashboard
    "dashboard.get" => $HomeCtrl.":dashboardView?login",

    "users.get" => $UserCtrl.":usersView?admin",
    "users-create.post" => $UserCtrl.":createUser?admin",
    "users-edit.post" => $UserCtrl.":editUser?admin",
    "users-delete.post" => $UserCtrl.":deleteUser?admin",


    "admin.get" => $AdminCtrl.":adminView?admin",
    "admin-create.post" => $AdminCtrl.":createAdmin?admin",
    "admin-edit.post" => $AdminCtrl.":editAdmin?admin",
    "admin-delete.post" => $AdminCtrl.":deleteAdmin?admin",


    "songs.get" => $SongCtrl.":songView?admin",
    "songs-create.post" => $SongCtrl.":createSong?admin",
    "songs-edit.post" => $SongCtrl.":editSong?admin",
    "songs-delete.post" => $SongCtrl.":deleteSong?admin",
);

$error = array(
    "notFound" => $ErrorCtrl.":notFound",
    "methodNotFound" => $ErrorCtrl.":methodNotFound"
);

$separate = explode("?", $routes[$path]);
$controller = explode(":", $separate[0]);

if ($controller[0] === "") {
    $controller = explode(":", $error['notFound']);
    call_user_func($controller);
}
else if (!method_exists($controller[0], $controller[1])) {
    $errorCtrl = explode(":", $error['methodNotFound']);
    call_user_func($errorCtrl, $controller);
} else {

    // check if middleware set
    if (!(count($separate) > 1)) {
        $separate[] = "guest";
    };

    // run if middleware is true and run the function
    if (call_user_func($separate[1])) {
        call_user_func($controller);        
    }
}