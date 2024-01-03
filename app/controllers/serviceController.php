<?php 

class Service extends Controller{

    public function index()
    {
        $data = array(
            'title' => 'Daftar Layanan'
        );

        unset($_SESSION['success']);
        unset($_SESSION['errors']);

        $this->view('service/list', $data);
    }

    public function data()
    {
 
        $table = 'services';
         
        // Table's primary key
        $primaryKey = 'id';
         
        $columns = array(
            array( 'db' => 'car_name', 'dt' => 'car_name' ),
            array( 'db' => 'car_type',  'dt' =>'car_type' ),
            array( 'db' => 'detail',  'dt' =>'detail' ),
            array( 'db' => 'cost',  'dt' =>'cost' ),
            array( 'db' => 'image',   'dt' => 'image' ),
            array( 'db' => 'created_at', 'dt'=> 'created_at',
                'formatter' => function($d){
                    return date( 'd M Y', strtotime($d));
                }),
            array(
                'db'        => 'id',
                'dt'        => 'action',
                'formatter' => function( $d, $row ) {
                
                    return '<a href="'.APP_PATH.'/service/edit/'.$d.'" class="btn btn-mini btn-warning"><i class="icon-pencil icon-white"></i> Edit</a> <a href="'.APP_PATH.'/service/delete/'.$d.'" class="btn btn-mini btn-danger"><i class="icon-remove icon-white"></i> Hapus</a>';
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
            'title' => 'Tambah Layanan'
        ];

        $this->view('service/create', $data);
       
    }

    public function store()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

            $serviceModel = $this->model('Service_model');
            $car_name = htmlspecialchars(trim($_POST['car_name']));
            $car_type = htmlspecialchars(trim($_POST['car_type']));
            $cost = htmlspecialchars(trim($_POST['cost']));
            $detail = htmlspecialchars(trim($_POST['detail']));

            if(empty($car_name)){
                $errors = [
                    'car_name' => 'Nama mobil harus diisi'
                ];
            }elseif(empty($car_type)){
                $errors = [
                    'car_type' => 'Jenis mobil harus diisi'
                ];
            }elseif(empty($cost)){
                $errors = [
                    'cost' => 'Tarif atau biaya harus diisi'
                ];
            }elseif(empty($detail)){
                $errors = [
                    'detail' => 'Informasi layanan harus diisi'
                ];
            }else {

                if(!$_FILES['image'] || $_FILES['image']['size'] == 0){
                    $errors = [
                        'image' => 'Tidak ada gambar yang dipilih'
                    ];
    
                } elseif(isset($_FILES['image']) && $_FILES['image']['size'] !== 0){
                    $allowedExt = array('jpg', 'jpeg', 'png');
                    $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                    $fileName = $_FILES['image']['name'];
                    $targetFile = DIR.'public'.DS.'upload'.DS.'services'.DS.basename($fileName);
    
                    if(!in_array($extension, $allowedExt)){
                        $errors = [
                            'image' => 'Gambar tidak didukung'
                        ];
                    } else {
                        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
    
                        $serviceModel->create($car_name, $car_type, $cost, $detail, $fileName);
                        $_SESSION['success'] = true;
                    }
                }
            }

            $_SESSION['errors'] = $errors;
            $_SESSION['car_name'] = $car_name;
            $_SESSION['car_type'] = $car_type;
            $_SESSION['cost'] = $cost;
            $_SESSION['detail'] = $detail;

            redirect('/service/create');
        } elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['hapus'])) {
            unset($_SESSION['errors']);
            unset($_SESSION['success']);
            unset($_SESSION['car_name']);
            unset($_SESSION['car_type']);
            unset($_SESSION['cost']);
            unset($_SESSION['detail']);

            redirect('/service/create');
        }
    }

    public function edit($id)
    {
        $serviceModel = $this->model('Service_model');
        $data = [
            'title' => 'Edit Layanan',
            'result' => $serviceModel->getById($id)
        ];

        $this->view('service/edit', $data);
    }

    public function update()
    {

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
            $serviceModel = $this->model('Service_model');
            $id = $_POST['id'];
            $car_name = htmlspecialchars(trim($_POST['car_name']));
            $car_type = htmlspecialchars(trim($_POST['car_type']));
            $cost = htmlspecialchars(trim($_POST['cost']));
            $detail = htmlspecialchars(trim($_POST['detail']));

            if(empty($car_name)){
                $errors = [
                    'car_name' => 'Nama mobil harus diisi'
                ];
            }elseif(empty($car_type)){
                $errors = [
                    'car_type' => 'Jenis mobil harus diisi'
                ];
            }elseif(empty($cost)){
                $errors = [
                    'cost' => 'Tarif atau biaya harus diisi'
                ];
            }elseif(empty($detail)){
                $errors = [
                    'detail' => 'Informasi layanan harus diisi'
                ];
            }else {

                if(!$_FILES['image'] || $_FILES['image']['size'] == 0){
                    $errors = [
                        'image' => 'Tidak ada gambar yang dipilih'
                    ];
    
                } elseif(isset($_FILES['image']) && $_FILES['image']['size'] !== 0){
                    $allowedExt = array('jpg', 'jpeg', 'png');
                    $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                    $fileName = $_FILES['image']['name'];
                    $targetFile = DIR.'public'.DS.'upload'.DS.'services'.DS.basename($fileName);
    
                    if(!in_array($extension, $allowedExt)){
                        $errors = [
                            'image' => 'Gambar tidak didukung'
                        ];
                    } else {
                        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
    
                        $serviceModel->update($id, $car_name, $car_type, $cost, $detail, $fileName);
                        $_SESSION['success'] = true;
                    }
                }
            }

            $_SESSION['errors'] = $errors;

            redirect('/service/edit/'.$id);
        } else {
            $id = $_POST['id'];
            unset($_SESSION['errors']);
            unset($_SESSION['success']);

            redirect('/service/edit/'.$id);
        }
    }

    public function delete($id)
    {
        $serviceModel = $this->model('Service_model');
        $result = $serviceModel->getById($id);

        if($result){
            $targetFile = DIR.'public'.DS.'upload'.DS.'services'.DS.basename($result->image);
            unlink($targetFile);
            $serviceModel->delete($id);
        }

        redirect('/service');
    }
}