<?php 
auth_protected();
// Instantiate the class
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

require_once PATH_LIBS. 'validation.php';

$errors = [];

// Draft post
if (isset($_POST['draft'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $val = new Validation();
    $val->name('title')->value($title)->required(); 
    $val->name('content')->value($content)->required();

  if ($val->isSuccess()) {
      $postId = $db->posts->insert([
            'title' => $title, 
            'content' => $content,
            'status' => 0,
            'user_id' => $_SESSION['loggedUser']['id'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

      if ($postId) {
        $msg->success(ucfirst($_SESSION['loggedUser']['name']). ' Your post has been saved in draft');
        header('Location: /createpost');
        exit;
      } else {
        $msg->error('Somthing went wrong.');
        header('Location: /createpost');
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
      $postId = $db->posts->insert([
            'title' => $title, 
            'content' => $content,
            'status' => 1,
            'user_id' => $_SESSION['loggedUser']['id'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

      if ($postId) {
        $msg->success(ucfirst($_SESSION['loggedUser']['name']). ' Your post has been published');
        header('Location: /createpost');
        exit;
      } else {
        $msg->error('Somthing went wrong.');
        header('Location: /createpost');
        exit;
      }

    } else {
       $errors = $val->getErrors();
  }
}


?>