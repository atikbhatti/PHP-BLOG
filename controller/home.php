<?php 
// Instantiate the class
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

$posts = $db->posts->whereStatusIs(1);
$posts->addOrder('id', 'desc');
$posts->addColumn('posts.*');
$posts->addColumn('users.first_name', 'fname');
$posts->addColumn('users.last_name', 'lname');
$user = $posts->addJoin('users', 'LEFT JOIN');
$user->addConstraint('users.id', 'posts.user_id');

// $posts->paginate($page_number);
// echo "Viewing page " . $posts->currentPage() . " of " . $posts->totalPages() . "\n";
// foreach ($posts as $post) {
//   echo "id: " . $post->id . ", name: " ."\n";
// }