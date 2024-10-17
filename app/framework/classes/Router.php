<?php
namespace app\framework\classes;

use Exception;

class Router{

    private string $path; //
    private string $request;

    private function routeFound($routes)
    {
        if((!isset($routes[$this->request]))){
            throw new Exception("Route {$this->path} does not exists");
        }
        
        if(!isset($routes[$this->request][$this->path])){
            throw new Exception("Route {$this->path} does not exists");
        }
    }

    private function controllerFound(string $controllerNameSpace, string $controller, string $action)
    {
        if(!(class_exists($controllerNameSpace)))
        {
            throw new Exception("The ontroller {$controller} does exists");
        }
        
        if(!method_exists($controllerNameSpace, $action))
        {
            throw new Exception("The action  {$action} does exists on controller {$controller} ");            
        }
    }

    public function execute($routes)
    {
        $this->path = path(); // $_SERVER['REQUEST_URI']
        $this->request = request(); // $_SERVER['REQUEST_METHOD']

        $this->routeFound($routes);

        [$controller, $action] = explode("@", $routes[$this->request][$this->path]);


        if(str_contains($action, ':'))
        {
            [$action, $auth] = explode(":", $action);
            Auth::check($auth);
        }


        $controllerNamespace = "app\\controllers\\{$controller}";

        $this->controllerFound($controllerNamespace, $controller, $action);

        $controllerInstance = new $controllerNamespace;
        $controllerInstance->$action();
        
    }


}// Routes
