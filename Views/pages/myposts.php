<?php include PATH_VIEWS.'includes/header.php'; ?>
<?php include PATH_CONTROLLER.'myposts.php'; ?>
<!-- Page Header -->
<header class="masthead">
  <div class="overlay"></div>
</header>

<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto mt-5">
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
          <a href="/postedit/<?php echo $post->id; ?>" class="fa fa-edit"></a>
          <a href="/postdelete/<?php echo $post->id; ?>" class="fa fa-trash"></a>
        <hr>
      <?php endforeach; ?>
      <!-- Pager -->
      <div class="clearfix">
        <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
      </div>
    </div>
  </div>
</div>

<hr/>

<?php include PATH_VIEWS.'includes/footer.php'; ?>
