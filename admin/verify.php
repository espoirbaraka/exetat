<?php
	include 'includes/sessionoutconnected.php';
	$conn = $pdo->open();

	if(isset($_POST['connect'])){
		$matricule = $_POST['matricule'];
		$password = htmlspecialchars(sha1($_POST['password']));
		try{
			$stmt = $conn->prepare("SELECT * FROM t_user WHERE Matricule = ? AND Password=?");
            $stmt->execute(array($matricule,$password));
			$nbre = $stmt->rowCount();
			
			if($nbre == 1){
				$row = $stmt->fetch();
				if($row['CodeCategorie'] == 2){
							$_SESSION['ConnectAdmin'] = $row['CodeUser'];
				}
				else{
					$_SESSION['ConnectEleve'] = $row['CodeUser'];
				}
			}
			else{
				$_SESSION['error'] = 'Utilisateur inexistant';
			}
		}
		catch(PDOException $e){
			echo "Erreur de connexion: " . $e->getMessage();
		}
	


	}
	else{
		$_SESSION['error'] = 'Entrez vos identifiants de connexion d\'abord';
	}

	$pdo->close();
	header('location: index.php');

?>
