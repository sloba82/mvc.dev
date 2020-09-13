<?php

class Users extends Controller
{
    public function __construct(){
        $this->userModel = $this->model('User');
    }

    //POST route /user/register
    public function register($post)
    {
        $data = [
            'name' => trim($post['name']),
            'email' => trim($post['email']),
            'password' => trim($post['password']),
            'confirm_password' => trim($post['confirm_password']),
            'name_err' => '',
            'email_err' => '',
            'password_err' => '',
            'confirm_password_err' => ''
        ];

        $this->view('users/register', $data);
    }

    public function login($post)
    {
        $data = [
            'email' => trim($post['email']),
            'password' => trim($post['password']),
            'email_err' => '',
            'password_err' => '',
        ];

        $this->view('users/login', $data);
    }

    
}
