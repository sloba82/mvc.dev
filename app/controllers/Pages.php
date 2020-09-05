<?php




class Pages extends Controller {

    public function __construct()
    {
       echo "!! pages !!!";
    }

    public function index(){
        $this->view('pages/index', [ 'title' =>  'some title']);
    }

    public function about($id) 
    {

        $this->view('pages/about', ['text'=> 'some text']);
    }

    public function test(){
        echo 'test';
    }

}