<?php 
auth_protected();
// Instantiate the class
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

require_once PATH_LIBS. 'validation.php';

$errors = [];

$post = $db->posts->whereIdIs($postId)->one();

// Draft post
if (isset($_POST['draft'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $val = new Validation();
    $val->name('title')->value($title)->required(); 
    $val->name('content')->value($content)->required();

  if ($val->isSuccess()) {
      $postId = $db->posts->update([
      		'id' => $postId,
            'title' => $title, 
            'content' => $content,
            'status' => 0,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

      if ($postId) {
        $msg->success(ucfirst($_SESSION['loggedUser']['name']). ' Your post has been saved in draft');
        header("Location: /postedit/".$post->id);
        exit;
      } else {
        $msg->error('Somthing went wrong.');
        header('Location: /postedit');
        exit;
      }

    } else {
       $errors = $val->getErrors();
  }
}

// Publish post
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $val = new Validation();
    $val->name('title')->value($title)->required(); 
    $val->name('content')->value($content)->required();

  if ($val->isSuccess()) {
      $postId = $db->posts->update([
      		'id' => $postId,
            'title' => $title, 
            'content' => $content,
            'status' => 1,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

      if ($postId) {
        $msg->success(ucfirst($_SESSION['loggedUser']['name']).' Your post has been update and published');
        header("Location: /postedit/".$post->id);
        exit;
      } else {
        $msg->error('Somthing went wrong.');
        header('Location: /postedit');
        exit;
      }

    } else {
       $errors = $val->getErrors();
  }
}

