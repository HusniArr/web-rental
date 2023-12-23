<?php

class Register extends Controller {

   
    public function index()
    {
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $user = $this->model('User_model');
            $username = htmlspecialchars(trim($_POST['username']));
            $email = htmlspecialchars(trim($_POST['email']));
            $password = htmlspecialchars(trim($_POST['password']));

            $user->create($username, $email, $password);
            echo "Berhasil disimpan ke database...";
        } else {

            $data = array(
                'title' => 'Register Page'
            );
            
            $this->view('auth/register', $data);
        }
    }

    
}