<?php 
session_start();
	if(!empty($_SESSION["userId"]) == false) {
		require_once __DIR__ . '/view/login-form.php';
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
</head>
<body>

	<a href="logout.php">Logout</a>
	<h1>This is the index page</h1>

	<br>
	Hello, <?php// $user_data['user_name']; ?>
</body>
</html>