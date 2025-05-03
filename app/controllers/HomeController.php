<?php
require_once __DIR__ . '/../models/StadiumModel.php';
require_once __DIR__ . '/../models/PlayerModel.php';
require_once __DIR__ . '/../models/CoachModel.php';
class HomeController
{
    public function home()
    { 
        $PlayerModel = new PlayerModel();
        $topPlayer=$PlayerModel->topPlayer();

        $StadiumModel = new StadiumModel();
        $topStadium=$StadiumModel->topStadium();

        $CoachModel = new CoachModel();
        $topCoach=$CoachModel->topCoach();

        require_once __DIR__ . '/../views/product/Home.php';

    }
}
