<?php

class Home extends Controller {

    public function __construct()
    {
        
    }

    public function index(){
        $this->view('pages/index', [ 'title' =>  'Home page']);
    }


}