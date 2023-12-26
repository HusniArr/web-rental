<?php 

class Logout extends Controller{

    public function index()
    {
        unset($_SESSION['user']);
        session_destroy();
        redirect('/login');
    }
}