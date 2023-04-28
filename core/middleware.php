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