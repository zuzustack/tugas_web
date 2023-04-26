<?php
$get = $_GET;
$post = $_POST;

if ($get || $_SERVER['REQUEST_METHOD'] === "POST") {
    $method = $_SERVER['REQUEST_METHOD'];
    $path = array_keys($_GET)[0] . "." . strtolower($_SERVER['REQUEST_METHOD']);

    $request = ${strtolower($_SERVER['REQUEST_METHOD'])};
} else {
    header("Location: /?login");
}