<?php require(ROOT .DS. 'app' .DS. 'views' .DS. 'partials' .DS. 'header-login.php') ?>
<?php 
$errors = $_SESSION['errors'];

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
             <?php 
                if(!empty($errors['username'])){
                    echo '<small>'.$errors['username'].'</small>';
                } else {
                    $errors['username'] = null;
                }
             ?>
            </div>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <div class="main_input_box">
              <span class="add-on"><i class="icon-lock"></i></span
              ><input type="password" placeholder="Password" name="password"/>
              <?php 
                if(!empty($errors['password'])){
                    echo '<small>'.$errors['password'].'</small>';
                } else {
                    $errors['password'] = null;
                }
             ?>
            </div>
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