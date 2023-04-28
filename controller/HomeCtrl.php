<?php

namespace Controller;

use Database;

class HomeCtrl extends BaseCtrl{
    static public function dashboardView(){
        return BaseCtrl::render("/views/dashboardView.php", [
            "pageTitle" => "Dashboard"
        ]);
    }
}