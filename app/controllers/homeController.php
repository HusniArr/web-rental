<?php

class Home extends Controller{

    public function index()
    {
        $galleryModel = $this->model('Gallery_model');
        $serviceModel = $this->model('Service_model');

        $data  = [
            'title' => 'Home Page',
            'galleries'=> $galleryModel->getAll(),
            'services'=> $serviceModel->getAll()
        ];

        $this->view('home', $data);
    }
}