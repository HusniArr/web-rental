<?php require(ROOT .DS. 'app' .DS. 'views' .DS. 'partials' .DS. 'header-login.php') ?>
<?php 
if(isset($_SESSION['errors'])){
  $errors = $_SESSION['errors'];
}

?>
<div id="loginbox">
      <form id="loginform" class="form-vertical" action="<?php echo APP_PATH?>/login/store" method="POST">
        <div class="control-group normal_text">
          <h3>LOGIN PAGE</h3>
        </div>
        <div class="control-group">
          <div class="controls">
            <div class="main_input_box">
              <span class="add-on"><i class="icon-user"></i></span
              ><input type="text" placeholder="Username" name="username"/>
            </div>
             <?php 
                if(isset($errors['username'])){
                    echo '<small style="color:red; margin-left: 20px;">'.$errors['username'].'</small>';
                } else {
                    unset($errors);
                }
             ?>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <div class="main_input_box">
              <span class="add-on"><i class="icon-lock"></i></span
              ><input type="password" placeholder="Password" name="password"/>
            </div>
              <?php 
                if(isset($errors['password'])){
                    echo '<small style="color:red;margin-left: 20px;">'.$errors['password'].'</small>';
                } else {
                     unset($errors);
                }
             ?>
          </div>
        </div>
        <div class="form-actions">
          <span class="pull-left"
            ><a href="#" class="flip-link btn btn-inverse" id="to-recover"
              >Lost password?</a
            ></span
          >
          <span class="pull-right"
            ><input type="submit" class="btn btn-success" value="Login"
          /></span>
        </div>
      </form>
      <form id="recoverform" action="#" class="form-vertical">
        <p class="normal_text">
          Enter your e-mail address below and we will send you instructions how
          to recover a password.
        </p>

        <div class="controls">
          <div class="main_input_box">
            <span class="add-on"><i class="icon-envelope"></i></span
            ><input type="text" placeholder="E-mail address" />
          </div>
        </div>

        <div class="form-actions">
          <span class="pull-left"
            ><a href="#" class="flip-link btn btn-inverse" id="to-login"
              >&laquo; Back to login</a
            ></span
          >
          <span class="pull-right"
            ><input type="submit" class="btn btn-info" value="Recover"
          /></span>
        </div>
      </form>
    </div>

<?php require(ROOT .DS. 'app' .DS. 'views' .DS. 'partials' .DS. 'footer-login.php') ?>