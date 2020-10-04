<?php


class Users extends Controller
{

    private $userModel;

    public function __construct(){
        $this->userModel = $this->model('User');
    }

    //POST route /user/register
    public function register($post)
    {

        $data = [];
        if (!empty($post)) {

            $name_err ='';
            $email_err = '';
            $password_err = '';
            $confirm_password_err = '';

           if(trim($post['password']) != trim($post['confirm_password'])){
             $confirm_password_err = 'Pasword is not mached';
           }

           if(!empty(trim($post['email']))){
             if ($this->userModel->getByEmail($post['email'])){
                $email_err = 'Email alredy exists';
             }
           }
            
            $data = [
                'name' => Validator::Alpha(trim($post['name'])) ? trim($post['name']) : $name_err = 'Name is not valid',
                'email' =>  Validator::Email(trim($post['email'])) ? trim($post['email']) : $email_err = 'Email is not valid',
                'password' => Validator::AlphaNumber(trim($post['password'])) ? trim($post['password']) : $password_err = 'Password must contain leter and numeric characters',
                'confirm_password' => Validator::AlphaNumber(trim($post['confirm_password'])) ? trim($post['confirm_password']) : $confirm_password_err = 'Password must contain leter and numeric characters' ,
                'name_err' => $name_err,
                'email_err' => $email_err,
                'password_err' =>  $password_err,
                'confirm_password_err' => $confirm_password_err
            ];
            
            if (!$data['name_err']
                && !$data['email_err']
                && !$data['password_err']
                && !$data['confirm_password_err']
            ){
                if($this->userModel->create($data)){
                    flash('register_success', 'You are register and can log in');
                    redirect('/users/login');
                }
                else {
                    die('somthing went wrong');
                }
            }
        }

        $this->view('users/register', $data);
    }

    public function login($post)
    {
        $data = [];

        if(!empty($post)){       
            if ($this->userModel->getByEmail($post['email'])){

            }else {
                $data['email_err'] = "Email not valid";
            }

            if(empty($post['password'])){
                $data['password_err'] = "Password not valid";
            }
        }

        if(empty($data['email_err']) && empty($data['password_err'])){
            $loggedInUser = $this->userModel->validateUser($post);

            var_dump( $loggedInUser);
        }
        
         $this->view('users/login', $data);
  
       
    }

    
}
