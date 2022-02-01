<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['add'])){
		$nom = $_POST['nom'];
        $postnom = $_POST['postnom'];
        $mail = $_POST['mail'];
        $password = sha1($_POST['password1']);
		$password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        $creator = $conn->prepare("SELECT @@hostname hostname");
        $creator->execute();
        $today = date('Y-m-d');
		$conn = $pdo->open();
        $filename = $_FILES['photo']['name'];
			
            if($password1 != $password2)
            {
                if(!empty($filename)){
                    move_uploaded_file($_FILES['photo']['tmp_name'], '../images/images_db/'.$filename);	
			    }
                try{
                    $stmt = $conn->prepare("INSERT INTO t_user(NomUser, PostnomUser, Email, Password, Photo, Created_on, CodeCategorie) VALUES(:nom, :postnom, :email, :password, :photo, :created_on, :categorie)");
                    $stmt->execute(['nom'=>$nom, 'postnom'=>$postnom, 'email'=>$mail, 'password'=>$password, 'photo'=>$filename, 'created_on'=>$today, 'categorie'=>2]);
                    $_SESSION['success'] = 'Utilisateur ajouté';
    
                }
                catch(PDOException $e){
                    $_SESSION['error'] = $e->getMessage();
                }
            }
            else{
                $_SESSION['error'] = 'Les 2 mots de passes ne sont pas les memes';
            }
            

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Compléter le formulaire d\'ajout materiel';
	}

	header('location: ../user.php');

?>
