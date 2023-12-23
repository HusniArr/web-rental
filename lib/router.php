<?php 

class Router
{
    private $controller = 'home';
    private $method = 'index';
    private $params = [];

    public function __construct()
    {
        $url = $this->getUrl();

         // cek controller jika ada
         if(!empty($url[0])){

            if (file_exists(ROOT.DS.'app'.DS.'controllers'.DS.$url[0].'Controller.php')) {
                $this->controller = $url[0];
                unset($url[0]);
            } else {
                exit('<h1>Page Not Found !</h1>');
            }
        }

        require_once ROOT . DS . 'app' . DS . 'controllers' . DS . $this->controller . 'Controller.php';
        $this->controller = new $this->controller;

        // cek method jika ada
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            } else {
                exit('<h1>Page Not Found!</h1>');
            }
        }

        // cek params jika ada
        if(isset($url[2])){
            $this->params = isset($url) ? array_values($url) : [];
        }

        //panggil controller dengan params
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function getUrl()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';
        return explode('/', filter_var(trim(strtolower($url), '/'), FILTER_SANITIZE_URL));

    }
}
