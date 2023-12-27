<?php

class Gallery extends Controller
{

    public function __construct()
    {
        if(!$_SESSION['user']){
            redirect('/login');
        }
    }

    public function index()
    {
        $data = array(
            'title' => 'Daftar galeri'
        );
        $this->view('gallery/list', $data);
    }

    public function data()
    {
 
        $table = 'galleries';
         
        // Table's primary key
        $primaryKey = 'id';
         
        $columns = array(
            array( 'db' => 'headline', 'dt' => 'headline' ),
            array( 'db' => 'info',  'dt' =>'info' ),
            array( 'db' => 'image',   'dt' => 'image' ),
            array(
                'db'        => 'created_at',
                'dt'        => 'created_at',
                'formatter' => function( $d, $row ) {
                    return date( 'd M Y', strtotime($d));
                }
            ),
            array(
                'db'        => 'id',
                'dt'        => 'action',
                'formatter' => function( $d, $row ) {
                    return '<a class="btn btn-mini btn-warning"><i class="icon-pencil icon-white"></i> Edit</a> <a class="btn btn-mini btn-danger"><i class="icon-remove icon-white"></i> Hapus</a>';
                }
            ),
        );
         
        // SQL server connection information
        $sql_details = array(
            'user' => 'root',
            'pass' => '',
            'db'   => 'web_rental',
            'host' => 'localhost',
            'charset' => 'utf8' // Depending on your PHP and MySQL config, you may need this
        );
         
         
        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
         * If you just want to use the basic configuration for DataTables with PHP
         * server-side, there is no need to edit below this line.
         */
         
        require(ROOT.DS.'lib'.DS.'ssp.class.php');
         
        echo json_encode(
            SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
        );
    }

    public function json()
    {
        $galleryModel = $this->model('Gallery_model');

        $result = $galleryModel->getAll();
        echo json_encode($result);
    }
}