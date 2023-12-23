<?php 

class Dashboard extends Controller {
     
    public function __construct()
    {
        if(!$_SESSION['user']){
            redirect('/login');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];

        $this->view('dashboard', $data);
    }
}