<?php

class Home extends Controller{

    public function index()
    {
        $galleryModel = $this->model('Gallery_model');
        $serviceModel = $this->model('Service_model');
        $totalRecords = $serviceModel->getCount();
        $perPage = 4;
        $totalPages= ceil($totalRecords / $perPage);

        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $perPage;
        $services = $serviceModel->getAllByLimit($start, $perPage);
        

        $data  = [
            'title' => 'Home Page',
            'galleries'=> $galleryModel->getAllByLimit(4),
            'services'=> $services,
            'page'=> $page,
            'totalPages'=> $totalPages
        ];

        $this->view('home', $data);
    }
}