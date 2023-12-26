<?php

class Login extends Controller
{
    public function __construct()
    {
        if(isset($_SESSION['user'])) redirect('/dashboard');
    }
   
    public function index()
    {
        $data = array(
            'title' => 'Login Page'
        );
        
        $this->view('auth/login', $data);
    }

    public function store()
    {
      if($_SERVER['REQUEST_METHOD'] == 'POST')
      {
        $userModel = $this->model('User_model');
        $username = htmlspecialchars(trim($_POST['username']));
        $pass = htmlspecialchars(trim($_POST['password']));
        $user = $userModel->findByUsername($username);
        
        // var_dump($user);die();
        if(empty($username)){
            $errors = [
                'username' => 'Username tidak boleh kosong'
            ];
        } elseif(empty($pass)) {
            $errors = ['password' => 'Password tidak boleh kosong'];
        } else{
            if($user){
                if(password_verify($pass, $user->pass)){
                    $_SESSION['user'] = $user;
                    redirect('/dashboard');
                } else {
                    $errors = ['username' => 'Username atau password salah'];
                }
            } else {
                $errors = ['username' => 'Username atau password salah'];
            }

        }

        
        $_SESSION['errors'] = $errors;

        redirect('/login');

      }
    }
}