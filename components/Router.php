<?php


class Router {
    
    private $routes;
    
    public function __construct() 
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }
    
    private function getUri()
    {
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
    
    public function run()
    {
        $uri = $this->getUri();
        foreach ($this->routes as $uriPattern => $path) {
            
            if(preg_match("~$uriPattern~", $uri)) {
                
                $segments = explode('/', $path);
                $controllerName = array_shift($segments);
                $actionName = array_shift($segments);
                
                require_once (ROOT . '/controllers/' . $controllerName . '.php');
                
                $controllerObject = new $controllerName();
                $result = $controllerObject->$actionName();
                if($result) {
                    break;
                }

            }
        }
        
        
       
    }
    
    
}
