<?php 
// Instantiate the class
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

require_once PATH_LIBS. 'validation.php';

$errors = [];

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$pass = $_POST['password'];

	$val = new Validation();
 	$val->name('email')->value($email)->pattern('email')->required(); 
    $val->name('password')->value($pass)->required();

    if ($val->isSuccess()) {
    	$user = $db->users->whereEmailIs($email)->one();
    	
    	if ($user) {
    		$_SESSION['loggedUser'] = ['id' => $user->id, 'name' => $user->first_name];
    		$msg->success('Welcome '. $user->first_name);
    		header('Location: /');
    	} else {
    		$msg->error('Invalid login or password.');
    	}

    } else {
       $errors = $val->getErrors();
	}
}

?>