<?php
require_once '../models/SearchModel.php';
require_once '../../config/database.php';

class SearchController
{
    private $model;

    public function __construct()
    {
        $database = new Database();
        $db = $database->connect();
        $this->model = new SearchModel($db);
    }

    public function search($query)
    {
        $results = $this->model->searchPlayers($query);
        include '../views/main-menu/SearchResults.php';
    }
}

// Xử lý yêu cầu từ phía client
if (isset($_GET['q'])) {
    $query = $_GET['q'];
    $controller = new SearchController();
    $controller->search($query);
}
