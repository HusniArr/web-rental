<?php require(ROOT .DS. 'app' .DS. 'views' .DS. 'partials' .DS. 'header-login.php') ?>

<div id="loginbox">
      <form id="loginform" class="form-vertical" action="<?php echo APP_PATH?>/register" method="POST">
        <div class="control-group normal_text">
          <h3><?php echo $title ?></h3>
        </div>
        <div class="control-group">
          <div class="controls">
            <div class="main_input_box">
              <span class="add-on"><i class="icon-user"></i></span
              ><input type="text" placeholder="Username" name="username" required autocomplete="off"/>
            </div>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <div class="main_input_box">
              <span class="add-on"><i class="icon-user"></i></span
              ><input type="text" placeholder="Email" name="email" required autocomplete="off"/>
            </div>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <div class="main_input_box">
              <span class="add-on"><i class="icon-lock"></i></span
              ><input type="password" placeholder="Password" name="password" required/>
            </div>
          </div>
        </div>
        <div class="form-actions">
          <span class="pull-right"
            ><input type="submit" class="btn btn-success" value="Register"
          /></span>
        </div>
      </form>
    </div>

<?php require(ROOT .DS. 'app' .DS. 'views' .DS. 'partials' .DS. 'footer-login.php') ?>