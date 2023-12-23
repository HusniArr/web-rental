
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
          <ul class="quick-actions">
            <li>
              <a href="#"> <i class="icon-dashboard"></i> My Dashboard </a>
            </li>
            <li>
              <a href="#"> <i class="icon-shopping-bag"></i> Shopping Cart</a>
            </li>
            <li>
              <a href="#"> <i class="icon-web"></i> Web Marketing </a>
            </li>
            <li>
              <a href="#"> <i class="icon-people"></i> Manage Users </a>
            </li>
            <li>
              <a href="#"> <i class="icon-calendar"></i> Manage Events </a>
            </li>
          </ul>
        </div>

      </div>
    </div>
   
<?php 
include (ROOT.DS.'app'.DS.'views'.DS.'partials'.DS.'footer.php');
?>
 
