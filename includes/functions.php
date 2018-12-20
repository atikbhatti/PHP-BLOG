<?php 
function print_err($text = '') {
     return '<p class="text-danger" style="margin:0px !important;">' . $text . '</p>';
}

function hash_password($string, $type = null, $salt = false) {

	if ($salt) {
		if (is_string($salt)) {
			$string = $salt . $string;
		} else {
			$string = SECURITY_SALT . $string;
		}
	}

	if ($type == 'sha1' || $type == null) {
		if (function_exists('sha1')) {
			return sha1($string);
		}

		$type = 'sha256';
	}

	if ($type == 'sha256' && function_exists('mhash')) {
		return bin2hex(mhash(MHASH_SHA256, $string));
	}

	if (function_exists('hash')) {
		return hash($type, $string);
	}

	return md5($string);
}

function password_validate($password = '', $hasedPassword = '') {
	return (password_hash($password) == $hasedPassword);
}

function format_err_msgs(&$val) {
	$val = str_replace('_', ' ', $val);
}

function social_auth($socialUser = []) {
	global $db;

	$socialId = $socialUser['platform'].$socialUser['id'];

	// fetching user to check if user already exists
	$stmt = $db->prepare('SELECT * FROM users WHERE social_id = ?');
	$stmt->execute([$socialId]);
	$user = $stmt->fetch();
	// echo "<pre>";
	// $stmt->debugDumpParams();
	// die();

	if (!$user) {
		$token = bin2hex(openssl_random_pseudo_bytes(8));
		$stmt = $db->prepare('INSERT INTO users (social_id, name, username, email, token) VALUES (?,?,?,?,?)');
		$stmt->execute([$socialId, $socialUser['name'], $socialId, $socialUser['email'], $token]);

		// $lastId = $db->lastInsertId();

		header("Location: /auth/social?token=$token");
	} else {
		$_SESSION['user'] = [
			'id' => $user->id, 
			'email' => $user->email, 
			'token' => sha1(rand(10, 100) . $user->id .$user->email . time())
		];

		header('Location: /');
		exit(1);
	}
}

function auth_protected()
{
	if (!isset($_SESSION['loggedUser']) && !empty($_SESSION['loggedUser'])) {
		header('Location: /');
		exit();
	}    
}

function auth_redirect()
{
	if (isset($_SESSION['loggedUser']) && !empty($_SESSION['loggedUser'])) {
		header('Location: /');
		exit();
	}    
}