<?php 
auth_protected();
// Instantiate the class
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

$posts = $db->posts->whereUserIdIs($_SESSION['loggedUser']['id']);
$posts->addOrder('id', 'desc');
$posts->addColumn('posts.*');
$posts->addColumn('users.first_name', 'fname');
$posts->addColumn('users.last_name', 'lname');
$user = $posts->addJoin('users', 'LEFT JOIN');
$user->addConstraint('users.id', 'posts.user_id');
?>