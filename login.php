<?php
	require("conn.php");

	if(empty($_POST['username']) || empty($_POST['password'])){
		if(empty($_POST['username'])){
			echo -1;
		}elseif(empty($_POST['password'])){
			echo -2;
		}
		exit();
	}
	
	$sql = "SELECT * FROM users WHERE username = '{$_POST['username']}' and password = '{$_POST['password']}'";
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['password'] = $_POST['password'];	
	$result = mysqli_query($conn, $sql);
	session_start();
	echo $count = mysqli_num_rows($result);
?>