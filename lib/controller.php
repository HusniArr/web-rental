<?php

class Controller {

    public function model($model)
    {
        require_once ROOT. DS . 'app' . DS . 'models' . DS . $model . '.php';
        return new $model;
    }

    public function view($viewName, $data=[])
    {
        extract($data);
        $view = ROOT . DS . 'app' . DS . 'views' . DS . $viewName . '.php';
        $notFound = ROOT . DS . 'app' . DS . 'views' . DS . 'not_found.php';
        if(file_exists($view)) require_once($view);
        else require_once($notFound);
        
    }
}