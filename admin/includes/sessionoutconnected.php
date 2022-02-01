<?php
	include './includes/conn.php';
	session_start();


	if(isset($_SESSION['ConnectAdmin'])){
		header('location: home.php');
	}
	elseif(isset($_SESSION['ConnectEleve']))
	{
		header('location: ../index.php');
	}

?>