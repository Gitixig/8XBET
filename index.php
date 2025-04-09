<?php
session_start();

spl_autoload_register(function ($class) {
    foreach (['app/controllers/', 'app/models/', 'config/'] as $dir) {
        $file = $dir . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

$controller = $_GET['controller'] ?? 'auth';
$action = $_GET['action'] ?? 'login';

$controllerClass = ucfirst($controller) . 'Controller';
$controllerFile = "app/controllers/$controllerClass.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $c = new $controllerClass();

    if (method_exists($c, $action)) {
        $c->$action();
    } else {
        echo "Không tìm thấy action '$action'.";
    }
} else {
    echo "Không tìm thấy controller '$controllerClass'.";
}
