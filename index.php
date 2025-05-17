<?php
require_once "app/controllers/AuthController.php";
require_once "app/controllers/PlayerController.php";
require_once "app/controllers/StadiumController.php";
require_once "app/controllers/CoachController.php";
require_once "app/controllers/UserController.php";
require_once "app/controllers/OrderController.php";
require_once "app/controllers/HomeController.php";
require_once "app/controllers/CartController.php";
require_once "app/controllers/CheckoutController.php";
require_once __DIR__ . '/config.php';

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

if ($controller === 'Product' && $action === 'view' && isset($_GET['id'])) {
    require_once 'app/controllers/ProductController.php';
    $productController = new ProductController();
    $productController->view($_GET['id']); // Truyền tham số ID
    exit;
}

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
