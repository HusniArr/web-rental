
 <?php 
  include (ROOT.DS.'app'.DS.'views'.DS.'partials'.DS.'header.php');
  include (ROOT.DS.'app'.DS.'views'.DS.'partials'.DS.'navbar.php');
  include (ROOT.DS.'app'.DS.'views'.DS.'partials'.DS.'sidebar.php');
?>

    <div id="content">
      <div id="content-header">
        <div id="breadcrumb">
          <a href="index.html" title="Go to Home" class="tip-bottom"
            ><i class="icon-home"></i> Home</a
          >
        </div>
      </div>
      <div class="container-fluid">
        <div class="quick-actions_homepage">
          <div class="row-fluid">
            <div class="span4">
              <div class="widget-box">
                <div class="widget-title">
                  <i class="icon-camera"></i>
                </div>
                <div class="widget-content">
                  20 Galeri
                </div>
              </div>
            </div>
            <div class="span4">
              <div class="widget-box">
                <div class="widget-title">
                  <i class="icon-user"></i> 
                </div>
                <div class="widget-content">
                  5 Pengguna
                </div>
              </div>
            </div>
            <div class="span4">
              <div class="widget-box">
                <div class="widget-title">
                  <i class="icon-tasks"></i>
                </div>
                <div class="widget-content">
                  15 Unit
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
   
<?php 
include (ROOT.DS.'app'.DS.'views'.DS.'partials'.DS.'footer.php');
?>
 
