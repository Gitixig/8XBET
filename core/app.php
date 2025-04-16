<?php
class App
{
    public function __construct() {}
    public function init()
    {
        $url = $_GET['url'];
        $urlarry = explode('/', $url); 
        $controller = $urlarry[0] . 'controller';
        require_once __DIR__ . '/../app/controllers/' . $urlarry[0] . 'controller.php';
        $controller = new $controller();
        $action = $urlarry[1];
        $controller->$action();
    }
}
