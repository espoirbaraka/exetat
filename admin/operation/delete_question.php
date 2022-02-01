<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['remove'])){
		$id = $_POST['id'];
		$conn = $pdo->open();
                
                try{
                    $stmt = $conn->prepare("DELETE FROM t_question WHERE CodeQuestion=:code");
                    $stmt->execute(['code'=>$id]);
                    $_SESSION['success'] = 'Question supprimée';
    
                }
                catch(PDOException $e){
                    $_SESSION['error'] = $e->getMessage();
                }
            

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Compléter le formulaire d\'ajout materiel';
	}

	header('location: ../question.php');

?>
