<?php


class Pages extends Controller {

    private $postModel;

    public function __construct()
    {
      $this->postModel = $this->model('Post');
    }

    public function index(){

        var_dump($this->postModel->getPosts());
        $data = [
            'title' => 'Pages title',
            'posts' => $this->postModel->getPosts(),
        ];

       
        $this->view('pages/index', $data);
    }

    public function about($id) 
    {
        var_dump($id);
        $this->view('pages/about', ['text'=> 'some text']);
    }

    public function test(){
        echo 'test';
    }

}