<?php

class Pages extends Controller {

    public function __construct()
    {
       
    }

    public function index(){
        $this->view('pages/index');
    }

    public function about($id) {
var_dump($id);
        $this->view('pages/about');
    }

}