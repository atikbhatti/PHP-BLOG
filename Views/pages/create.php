<?php include PATH_VIEWS.'includes/header.php'; ?>
<?php include PATH_CONTROLLER.'create.php'; ?>
<header class="masthead"></header>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-md-5">
      <div class="row mt-5">
        <div class="col text-center">
           <?php $msg->display(); ?>
          <h1 style="font-size: 30px !important">Create Post</h1>
        </div>
      </div>

      <form action="" method="post">
        <div class="row align-items-center">
          <div class="col mt-4 form-group">
            <input name="title" type="text" class="form-control" placeholder="Post title" value="<?php echo @$fname; ?>">
            <?php echo @(isset($errors['title'])) ? print_err($errors['title']) : ''; ?>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col mt-4 form-group">
            <textarea rows="5" class="form-control" name="content"><?php echo @$content; ?></textarea>
            <?php echo @(isset($errors['content'])) ? print_err($errors['content']) : ''; ?>
          </div>
        </div>
        <div class="row justify-content-start">
          <div class="col">
            <button type="submit" name="submit" class="btn btn-primary mt-4 reg-btn">Publish</button>
            <button type="submit" name="draft" class="btn btn-primary mt-4 reg-btn">Save as Draft</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include PATH_VIEWS.'includes/footer.php'; ?>