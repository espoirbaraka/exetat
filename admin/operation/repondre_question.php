<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['add'])){
        $bonne_reponse = $_POST['bn_reponse'];
        $question = $_GET['id'];
		for($j=1; $j<=5; $j++)
        {
            $reponse = $_POST['question'.$j];
            $status = $_POST['status'.$j];
            
            try{
                if($bonne_reponse==$j)
                {
                    $stmt = $conn->prepare("INSERT INTO t_reponse(Reponse, CodeQuestion, CodeStatus, CodeAssertion) VALUES(:reponse, :question, :status, :assertion)");
                    $stmt->execute(['reponse'=>$reponse, 'question'=>$question, 'status'=>1, 'assertion'=>$j]);
                    $_SESSION['success'] = 'Reponse ajouté';
                    
                    
                }
                else
                {
                    $stmt = $conn->prepare("INSERT INTO t_reponse(Reponse, CodeQuestion, CodeStatus, CodeAssertion) VALUES(:reponse, :question, :status, :assertion)");
                    $stmt->execute(['reponse'=>$reponse, 'question'=>$question, 'status'=>2, 'assertion'=>$j]);
                    $_SESSION['success'] = 'Reponse ajouté';
                }
                

                    

            }
            catch(PDOException $e){
                $_SESSION['error'] = $e->getMessage();
            }
        }
	}
	else{
		$_SESSION['error'] = 'Compléter le formulaire d\'ajout materiel';
	}

	header("location: ../question.php?id=$question");

?>
