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
                
                    return '<a href="'.APP_PATH.'/gallery/edit/'.$d.'" class="btn btn-mini btn-warning"><i class="icon-pencil icon-white"></i> Edit</a> <a href="'.APP_PATH.'/gallery/delete/'.$d.'" class="btn btn-mini btn-danger"><i class="icon-remove icon-white"></i> Hapus</a>';
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

    public function create()
    {
        $data = [
            'title' => 'Tambah Galeri'
        ];

        $this->view('gallery/create', $data);
       
    }

    public function store()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $galleryModel = $this->model('Gallery_model');
            $headline = htmlspecialchars(trim($_POST['headline']));
            $info = htmlspecialchars(trim($_POST['info']));

            if(empty($headline)){
                $errors = [
                    'error_headline' => 'Headline harus diisi'
                ];
            } else {

                if(!$_FILES['image'] || $_FILES['image']['size'] == 0){
                    $errors = [
                        'error_image' => 'Tidak ada gambar yang dipilih'
                    ];
    
                } elseif(isset($_FILES['image']) && $_FILES['image']['size'] !== 0){
                    $allowedExt = array('jpg', 'jpeg', 'png');
                    $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                    $fileName = $_FILES['image']['name'];
                    $targetFile = DIR.'public'.DS.'upload'.DS.'galleries'.DS.basename($fileName);
    
                    if(!in_array($extension, $allowedExt)){
                        $errors = [
                            'error_image' => 'Gambar tidak didukung'
                        ];
                    } else {
                        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
    
                        $galleryModel->create($headline, $info, $fileName);
                        $_SESSION['success'] = true;
                    }
                }
            }

            $_SESSION['errors'] = $errors;
            
            redirect('/gallery/create');
        }
    }

    public function edit($id)
    {
        $galleryModel = $this->model('Gallery_model');
        $data = [
            'title' => 'Edit Galeri',
            'result' => $galleryModel->getById($id)
        ];

        $this->view('gallery/edit', $data);
    }

    public function update()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $galleryModel = $this->model('Gallery_model');
            $id = $_POST['gallery_id'];
            $headline = htmlspecialchars(trim($_POST['headline']));
            $info = htmlspecialchars(trim($_POST['info']));

            if(empty($headline)){
                $errors = [
                    'error_headline' => 'Headline harus diisi'
                ];

            } else {

                if(!$_FILES['image'] || $_FILES['image']['size'] == 0){
                    $errors = [
                        'error_image' => 'Tidak ada gambar yang dipilih'
                    ];
    
                } elseif(isset($_FILES['image']) && $_FILES['image']['size'] !== 0){
                    $allowedExt = array('jpg', 'jpeg', 'png');
                    $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                    $fileName = $_FILES['image']['name'];
                    $targetFile = DIR.'public'.DS.'upload'.DS.'galleries'.DS.basename($fileName);
    
                    if(!in_array($extension, $allowedExt)){
                        $errors = [
                            'error_image' => 'Gambar tidak didukung'
                        ];
                    } else {
                        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
    
                        $galleryModel->update($id, $headline, $info, $fileName);
                        $_SESSION['success_update'] = true;

                        redirect('/gallery');
                    }
                }
            }

            $_SESSION['errors'] = $errors;

            redirect('/gallery/edit/'.$id);          
        }
    }

    public function delete($id)
    {
        $galleryModel = $this->model('Gallery_model');
        $result = $galleryModel->getById($id);

        if($result){
            $targetFile = DIR.'public'.DS.'upload'.DS.'galleries'.DS.basename($result->image);
            unlink($targetFile);
            $galleryModel->delete($id);
        }

        redirect('/gallery');
    }
}