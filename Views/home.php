<?php include PATH_VIEWS.'includes/header.php'; ?>
<?php include PATH_CONTROLLER.'home.php'; ?>
<!-- Page Header -->
<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <?php $msg->display(); ?>
          <h1>Clean Blog</h1>
          <span class="subheading">A Blog Theme by Start Bootstrap</span>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <?php foreach ($posts as $post):?>
        <div class="post-preview">
          <a href="post.html">
            <h2 class="post-title">
              <?php echo $post->title; ?>
            </h2>
          </a>
            <p>
              <?php echo $post->content; ?>
            </p>
          <p class="post-meta">Posted by
            <a href="#"><?php echo ucfirst($post->fname); ?></a>
            <?php echo  date("d-m-Y", strtotime($post->created_at)); ?></p>
        </div>
        <hr>
      <?php endforeach; ?>
      <!-- Pager -->
      <div class="clearfix">
        <a class="btn btn-primary float-right" href="javascript:;">Older Posts &rarr;</a>
      </div>
    </div>
  </div>
</div>

<hr/>

<?php include PATH_VIEWS.'includes/footer.php'; ?>
