<?php
	include 'conn.php';
	session_start();

	if(!isset($_SESSION['ConnectAdmin']) || trim($_SESSION['ConnectAdmin']) == ''){
		header('location: ./index.php');
		exit();
	}

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM t_user WHERE CodeUser=:code");
	$stmt->execute(['code'=>$_SESSION['ConnectAdmin']]);
	$user = $stmt->fetch();

	$pdo->close();

?>