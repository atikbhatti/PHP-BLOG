<?php include PATH_VIEWS.'includes/header.php'; ?>
<?php include PATH_CONTROLLER.'register.php'; ?>
<header class="masthead"></header>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-md-5">
        <?php $msg->display(); ?>
      <div class="row mt-5">
        <div class="col text-center">
          <h1 style="font-size: 30px !important">Register</h1>
        </div>
      </div>

      <form action="" method="post">
        <div class="row align-items-center">
          <div class="col mt-4 form-group">
            <input name="first_name" type="text" class="form-control" placeholder="First Name" value="<?php echo @$fname; ?>">
            <?php echo @(isset($errors['first_name'])) ? print_err($errors['first_name']) : ''; ?>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col mt-4 form-group">
            <input name="last_name" type="text" class="form-control" placeholder="Last Name" value="<?php echo @$lname; ?>">
            <?php echo @(isset($errors['last_name'])) ? print_err($errors['last_name']) : ''; ?>
          </div>
        </div>
        <div class="row align-items-center mt-4">
          <div class="col">
            <input name="email" type="email" class="form-control" placeholder="Email" value="<?php echo @$email; ?>">
            <?php echo @(isset($errors['email'])) ? print_err($errors['email']) : ''; ?>
          </div>
        </div>
        <div class="row align-items-center mt-4 form-group">
          <div class="col">
            <input name="password" type="password" class="form-control" placeholder="Password">
            <?php echo @(isset($errors['password'])) ? print_err($errors['password']) : ''; ?>
          </div>
          <div class="col">
            <input name="confirm_password" type="password" class="form-control" placeholder="Confirm Password">
            <?php echo @(isset($errors['confirm_password'])) ? print_err($errors['confirm_password']) : ''; ?>
          </div>
        </div>
        <div class="row justify-content-start">
          <div class="col">
            <button type="submit" name="submit" class="btn btn-primary mt-4 btn-block reg-btn">Register</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include PATH_VIEWS.'includes/footer.php'; ?>