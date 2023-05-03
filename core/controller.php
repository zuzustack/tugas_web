<?php

use Controller\BaseCtrl;
use Controller\ErrorCtrl;

include_once(__DIR__ . "/../controller/BaseCtrl.php");
include_once(__DIR__ . "/../controller/HomeCtrl.php");
include_once(__DIR__ . "/../controller/UserCtrl.php");
include_once(__DIR__ . "/../controller/SongCtrl.php");
include_once(__DIR__ . "/../controller/AdminCtrl.php");
include_once(__DIR__ . "/../controller/AuthCtrl.php");
include_once(__DIR__ . "/../controller/ErrorCtrl.php");



BaseCtrl::$request = $request;
BaseCtrl::$files = $_FILES;

$DB = Database::connect('crudweb');

if (!$DB) {
    ErrorCtrl::errorDatabase(mysqli_connect_error());
} else {
    Database::$DB = $DB;
}