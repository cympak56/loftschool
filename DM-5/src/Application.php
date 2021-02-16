<?php

namespace Base;

use App\Controller\User;
use App\Controller\Blog;
use App\Controller\Admin\Users;

class Application
{
    private $route;
    /** @var AbstractController */
    private $controller;
    private $actionName;
    
    public function __construct()
    {
        $this->route = new Route();
    }
    
    public function run()
    {
        try {
            session_start();
            $this->addRoutes();
            $this->initController();
            $this->initAction();
            
            $view = new View();
            $this->controller->setView($view);
            $this->initUser();
            
            $content = $this->controller->{$this->actionName}();
            
            echo $content;
            
        } catch (RedirectException $e) {
            header('Location: ' . $e->getUrl());
            die;
        } catch (RouteException $e) {
            header("HTTP/1.0 404 Not Found");
            echo $e->getMessage();
        }
    }
    
    private function initUser()
    {
        $id = $_SESSION['id'] ?? null;
        if ($id) {
            $user = \App\Model\User::getById($id);
            if ($user) {
                $this->controller->getUser($user);
            }
        }
    }
    
    private function addRoutes()
    {
        $this->route->addRoute('/blog', Blog::class, 'index');
        $this->route->addRoute('/', Blog::class, 'index');
        $this->route->addRoute('/admin/index', \App\Controller\Admin\Users::class, 'index');
        $this->route->addRoute('/admin/add', \App\Controller\Admin\Users::class, 'add');
        $this->route->addRoute('/admin/edit', \App\Controller\Admin\Users::class, 'edit');
        $this->route->addRoute('/admin/image', \App\Controller\Admin\Users::class, 'image');
        $this->route->addRoute('/admin/delete', \App\Controller\Admin\Users::class, 'delete');
    }
    
    private function initController()
    {
        $controllerName = $this->route->getControllerName();
        if (!class_exists($controllerName)) {
            throw new RouteException('Cant find controller ' . $controllerName);
        }
        
        $this->controller = new $controllerName();
    }
    
    private function initAction()
    {
        $actionName = $this->route->getActionName();
        if (!method_exists($this->controller, $actionName)) {
            throw new RouteException('Action ' . $actionName . ' not found in ' . get_class($this->controller));
        }
        
        $this->actionName = $actionName;
    }
}