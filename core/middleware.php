<?php

function guest(){
    if (!isset($_SESSION['user'])) {
        return true;
    }

    header("Location: /?dashboard");
    return false;
}


function login(){
    if (isset($_SESSION['user'])) {
        return true;
    }

    header("Location: /?login");
    return false;
}


function admin(){
    if (!isset($_SESSION['user'])) {
        return false;
    }


    if ($_SESSION['user']['is_admin'] == '1') {
        return true;
    }

    header("Location: /?login");
    return false;
}