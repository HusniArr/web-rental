<?php 
  include (ROOT.DS.'app'.DS.'views'.DS.'partials'.DS.'header.php');
  include (ROOT.DS.'app'.DS.'views'.DS.'partials'.DS.'navbar.php');
  include (ROOT.DS.'app'.DS.'views'.DS.'partials'.DS.'sidebar.php');
?>

<?php 
    if(isset($_SESSION['errors'])){
        $errors = $_SESSION['errors'];
    }

?>

<div id="content">
    <div id="content-header">
        <div id="breadcrumb">
          <a href="<?php echo APP_PATH?>/service" title="Go to Service" class="tip-bottom"
            ><i class="icon-home"></i> Layanan</a
          > <span></span> <small><?php echo $title ?></small>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <?php 
                    if(isset($_SESSION['success'])){
                        echo '<div class="alert alert-success">Data layanan berhasil disimpan</div>';
                    }
                ?>
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon">
                            <i class="icon-info-sign"></i>
                        </span>
                        <h5><?php echo $title ?></h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="<?php echo APP_PATH ?>/service/store" method="POST" enctype="multipart/form-data" name="basic_validate" id="basic_validate" class="form-horizontal" novalidate="novalidate">
                            <div class="control-group">
                                <label class="control-label">Nama Mobil</label>
                                <div class="controls">
                                <input type="text" name="car_name" id="car_name" autocomplete="off" value="<?php echo isset($_SESSION['car_name']) ?  $_SESSION['car_name'] : ''?>">
                                    <?php 
                                        if(isset($errors['car_name'])){
                                            echo '<small style="color:red; margin-left: 20px;">'.$errors['car_name'].'</small>';
                                        } 
                                    ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Jenis Mobil</label>
                                <div class="controls">
                                <input type="text" name="car_type" id="car_type" autocomplete="off" value="<?php echo isset($_SESSION['car_type']) ? $_SESSION['car_type'] : ''?>">
                                    <?php 
                                        if(isset($errors['car_type'])){
                                            echo '<small style="color:red; margin-left: 20px;">'.$errors['car_type'].'</small>';
                                        } 
                                    ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Tarif / Biaya Perjalanan</label>
                                <div class="controls">
                                <input type="number" name="cost" id="cost" autocomplete="off" value="<?php echo isset($_SESSION['cost']) ? $_SESSION['cost'] : ''?>">
                                    <?php 
                                        if(isset($errors['cost'])){
                                            echo '<small style="color:red; margin-left: 20px;">'.$errors['cost'].'</small>';
                                        } 
                                    ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Detail</label>
                                <div class="controls">
                                <textarea name="detail" id="detail" cols="20" rows="5"><?php echo isset($_SESSION['detail']) ? $_SESSION['detail'] : ''?></textarea>
                                <?php 
                                        if(isset($errors['detail'])){
                                            echo '<small style="color:red; margin-left: 20px;">'.$errors['detail'].'</small>';
                                        } 
                                    ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Foto <sup>( JPG, JPEG, PNG )</sup></label>
                                <div class="controls">
                                <input type="file" name="image" id="image">
                                    <?php 
                                        if(isset($errors['image'])){
                                            echo '<small style="color:red; margin-left: 20px;">'.$errors['image'].'</small>';
                                        } 
                                    ?>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button  type="submit" class="btn btn-success" name="submit">Simpan</button> <button  type="submit" class="btn btn-danger" name="hapus">Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<?php 
include (ROOT.DS.'app'.DS.'views'.DS.'partials'.DS.'footer.php');
?>
