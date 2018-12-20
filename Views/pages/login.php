<?php include PATH_VIEWS.'includes/header.php'; ?>
<?php include PATH_CONTROLLER.'login.php'; ?>

<div class="container-fluid" style="margin: 10px 0px;">
  <div class="row justify-content-center">
    <div class="col-12 col-md-4 mt-5">
      <?php $msg->display(); ?>
      <div class="row mt-5">
        <div class="col text-center">
          <h1 style="font-size: 30px !important">Login</h1>
        </div>
      </div>

      <form action="" method="post">
        <div class="row align-items-center">
          <div class="col mt-4 form-group">
            <input name="email" type="text" class="form-control" placeholder="Email" value="<?php echo @$username; ?>">
            <?php echo @(isset($errors['email'])) ? print_err($errors['email']) : ''; ?>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col mt-4 form-group">
            <input name="password" type="password" class="form-control" placeholder="Password">
            <?php echo @(isset($errors['password'])) ? print_err($errors['password']) : ''; ?>
          </div>
        </div>
        <div class="row justify-content-start">
          <div class="col">
            <button type="submit" name="submit" class="btn btn-primary mt-4 btn-block reg-btn">Login</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include PATH_VIEWS.'includes/footer.php'; ?>