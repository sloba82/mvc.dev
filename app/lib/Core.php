<?php

class Core
{

    protected $currentController = 'Home';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();

        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {

            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;

        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        //Get params
        $this->params = $url ? array_values($url) : [];
        // Instantiate controller
        $controller = new $this->currentController();
        $controller->{$this->currentMethod}($this->params);

    }

    public function getUrl()
    {
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);


        return  $url;
    }
}
