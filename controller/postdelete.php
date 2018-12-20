<?php
auth_protected();
// Instantiate the class
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

$deletePost = $db->posts->delete([
	'id' => $postId
]);

if ($deletePost) {
    $msg->success(ucfirst($_SESSION['loggedUser']['name']). ' Your post has been deleted');
    header("Location: /createpost");
	exit;
} else {
	$msg->error('Somthing went wrong.');
	header('Location: /createpost');
	exit;
}