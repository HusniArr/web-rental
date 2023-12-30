<?php 
  include (ROOT.DS.'app'.DS.'views'.DS.'partials'.DS.'header.php');
  include (ROOT.DS.'app'.DS.'views'.DS.'partials'.DS.'navbar.php');
  include (ROOT.DS.'app'.DS.'views'.DS.'partials'.DS.'sidebar.php');
?>

<div id="content">
    <div id="content-header">
        <div id="breadcrumb">
          <a href="<?php echo APP_PATH?>/gallery" title="Go to Gallery" class="tip-bottom"
            ><i class="icon-home"></i> Galeri</a
          > <span></span> <small><?php echo $title ?></small>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <?php 
                    if(isset($_SESSION['success'])){
                        echo '<div class="alert alert-success">Galeri berhasil disimpan</div>';
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
                        <form action="<?php echo APP_PATH ?>/gallery/store" method="POST" enctype="multipart/form-data" name="basic_validate" id="basic_validate" class="form-horizontal" novalidate="novalidate">
                            <div class="control-group">
                                <label class="control-label">Headline</label>
                                <div class="controls">
                                <input type="text" name="headline" id="headline">
                                    <?php 
                                        if(isset($error_headline)){
                                            echo '<small style="color:red; margin-left: 20px;">'.$error_headline.'</small>';
                                        } 
                                    ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Detail</label>
                                <div class="controls">
                                <textarea name="info" id="info" cols="20" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Foto <sup>( JPG, JPEG, PNG )</sup></label>
                                <div class="controls">
                                <input type="file" name="image" id="image">
                                    <?php 
                                        if(isset($error_image)){
                                            echo '<small style="color:red; margin-left: 20px;">'.$error_image.'</small>';
                                        } 
                                    ?>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button  type="submit" class="btn btn-success">Simpan</button>
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
