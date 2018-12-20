<?php
$db = new pdoext_Connection("mysql:dbname=$DB;host=$HOST", $USERNAME, $PASSWORD);
// $DSN = "mysql:host=$HOST;dbname=$DB;";

// $OPTIONS = [
//     PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
//     PDO::ATTR_EMULATE_PREPARES   => false,
// ];

// try {
// 	$db = new PDO($DSN, $USERNAME, $PASSWORD, $OPTIONS);
// 	// print_r($db);
// } catch(Exception $e) {
// 	print_r($e);
// }


?>