<?php
use app\core\classes\UrlException;
use app\core\classes\ValidateException;

Class Route
{

    protected $routes;
    protected $controller = 'app\controllers\IndexController';
    protected $action = 'actionIndex';

    public function run()
    {

        $this->routes = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($this->routes[1])) {
            if (file_exists(DIR_CONTROLLER_PATH . ucfirst($this->routes[1]) . 'Controller.php')) {
                $this->controller = __NAMESPACE_CONTROLLER__ . ucfirst($this->routes[1]) . 'Controller';
            } else {
                ValidateException::invalidControllerName('Unknown Controller Name');
            }
        }

        if (!empty($this->routes[2])) {
            $this->action = 'action' . ucfirst($this->routes[2]);
        }

        $controller = new $this->controller;
        $action = $this->action;

        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            UrlException::invalidControllerName('Unknown Action name');
        }

    }
}