<?php
include("includes/sessionconnected.php");

include("includes/head.php");

include("includes/navbar_menubar.php");


$conn = $pdo->open();

$section = $conn->prepare("SELECT * FROM t_section WHERE IdSection=?");
$section->execute(array($_GET['id']));
$row = $section->fetch();

$pdo->close();
?>

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Questionnaires:: <?php echo $row['Section'].' '.$row['Option']; ?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item active"><a href="hpme.php">Acceuil</a></li>
        </ul>
      </div>
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Erreur!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Succès!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
                <div class="box-header with-border" style="margin-bottom: 8px;">
                    <a href="poser_question.php?sec=<?php echo $_GET['id']; ?>" class="btn btn-primary btn-sm btn-flat" style="float: left;"><i class="fa fa-plus"></i> Poser des questions</a>
                    <a href="etat_de_sortie/e_question.php?sec=<?php echo $_GET['id']; ?>" class="btn btn-primary btn-sm btn-flat" style="float: right;"><i class="fa fa-print"></i> Print</a>
                </div>
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Cours</th>
                      <th>Question</th>
                      <th>Assertion A</th>
                      <th>Assertion B</th>
                      <th>Assertion C</th>
                      <th>Assertion D</th>
                      <th>Assertion E</th>
                      <th>Action</th>
                      <!-- <th>Ed</th>
                      <th>Sup</th> -->
                    </tr>
                  </thead>
                  <tbody>
                        <?php
                            $conn = $pdo->open();

                            try{
                            $stmt = $conn->prepare("SELECT * FROM t_question
                                                    INNER JOIN t_section
                                                    ON t_question.CodeSection=t_section.IdSection
                                                    INNER JOIN t_cours
                                                    ON t_question.CodeCours=t_cours.CodeCours
                                                    WHERE t_question.CodeSection=?");
                            $stmt->execute(array($_GET['id']));

                            foreach($stmt as $question){
                                $stmt2 = $conn->prepare("SELECT * FROM t_reponse WHERE CodeQuestion=? ORDER BY CodeReponse");
                                $stmt2->execute(array($question['CodeQuestion']));
                                // $reponseexist = $stmt2->fetchAll();
                                // if($reponseexist!=0)
                                // {
                                  
                                // }
                                
                                echo "
                                <tr>
                                    <td>".$question['Cours']."</td>
                                    <td>".$question['Question']."</td>
                                    ";
                                    foreach($stmt2 as $reponse)
                                    {
                                      if($reponse['CodeStatus']==1)
                                      {
                                        echo "
                                      <td style='color: red;'>".$reponse['Reponse']."</td>
                                      ";
                                      }
                                      else
                                      {
                                        echo "
                                      <td>".$reponse['Reponse']."</td>
                                      ";
                                      }
                                      
                                    }
                                  
                                    echo "
                                    <td>
                                        <a href='repondre_question.php?id=".$question['CodeQuestion']."' class='btn btn-success btn-sm btn-flat'> Repondre </a>
                                        <a href='#editquestion' data-toggle='modal' class='btn btn-primary edit btn-sm btn-flat' data-id='".$question['CodeQuestion']."'><i class='fa fa-edit'></i> </a>
                                        <a href='#removequestion' data-toggle='modal' class='btn btn-danger delete btn-sm btn-flat' data-id='".$question['CodeQuestion']."'><i class='fa fa-remove'></i> </a>
                                    </td>
                                    

                                    
                                </tr>
                                    ";
                            }
                            }
                            catch(PDOException $e){
                            echo $e->getMessage();
                            }

                            $pdo->close();
                        ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <?php
    include("modal/question.php");

    include("includes/script.php");
    ?>
    <script>
$(function(){

  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#editer').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });



});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'operation/question_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.codequestion').val(response.CodeQuestion);
      $('#question').val(response.Question);
      $('.laquestion').html(response.Question);
    }
  });
}
</script>