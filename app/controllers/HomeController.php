<?php
require_once __DIR__ . '/../models/StadiumModel.php';
require_once __DIR__ . '/../models/PlayerModel.php';
require_once __DIR__ . '/../models/CoachModel.php';
class HomeController
{
    public function home()
    { 
        require_once __DIR__ . '/../views/product/Home.php';

    }
}
