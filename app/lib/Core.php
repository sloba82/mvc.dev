<?php

class Core
{

    /**
     * Core class acted as router
     *  gets controller and method from url 
     *  E.g. http://localhost/mvc.dev/pages/about/
     * 
     */
    protected $currentController = 'Home';
    protected $currentMethod = 'index';
    protected $params = [];
    protected $post = [];
    protected $url = [];

    public function __construct()
    {

        $this->getUrl();
        $this->getPost();
        $this->callController();
    }

    public function getUrl()
    {
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        $this->url = $url;
    }

    public function getPost()
    {
        $this->post = filter_input_array(INPUT_POST, $_POST);
    }

    public function callController()
    {

        if (file_exists('../app/controllers/' . ucwords($this->url[0]) . '.php')) {

            $this->currentController = ucwords($this->url[0]);
            unset($this->url[0]);
        }

        require_once '../app/controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;

        if (isset($this->url[1])) {
            if (method_exists($this->currentController, $this->url[1])) {
                $this->currentMethod = $this->url[1];
                unset($this->url[1]);
            }
        }

        //Get params
        if (!empty($this->post) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->params = $this->post;
        } else {
            $this->params = $this->url ? array_values($this->url) : [];
        }

        $controller = new $this->currentController();
        $controller->{$this->currentMethod}($this->params);
    }
}
