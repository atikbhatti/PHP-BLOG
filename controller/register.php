<?php 
auth_redirect();
// Instantiate the class
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

require_once PATH_LIBS. 'validation.php';

$errors = [];

if (isset($_POST['submit'])) {
	$fname = $_POST['first_name'];
	$lname = $_POST['last_name'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$cpass = $_POST['confirm_password'];

	$val = new Validation();
    $val->name('first_name')->value($fname)->required();
    $val->name('last_name')->value($lname)->required();
    $val->name('email')->value($email)->pattern('email')->required(); 
    $val->name('password')->value($pass)->equal($cpass)->required();
    $val->name('confirm_password')->value($cpass)->required()->equal($pass);

    if ($val->isSuccess()) {

        $hashPassword = hash_password($pass, 'sha1', true);

        $userId = $db->users->insert([
            'first_name' => $fname, 
            'last_name' => $lname,
            'email' => $email,
            'password' => $hashPassword,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
       
        if ($userId) {
            $user = $db->users->whereIdIs($userId)->one();

            $_SESSION['loggedUser'] = ['id' => $user->id, 'name' => $user->first_name];
            $msg->success('Welcome '. ucfirst($user->first_name));
            header('Location: /');
            exit;
        } else {
            $msg->error("Somthing went wrong!");
            header('Location: /login');
            exit;
        }

    } else {
       $errors = $val->getErrors();
    }
}

// Format error messages
array_walk($errors, 'format_err_msgs');
?>