<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
        $question = $_POST['question'];
		$conn = $pdo->open();
                
                try{
                    $stmt = $conn->prepare("UPDATE t_question SET Question=:question WHERE CodeQuestion=:code");
                    $stmt->execute(['question'=>$question, 'code'=>$id]);
                    $_SESSION['success'] = 'Question modifiée';
    
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
