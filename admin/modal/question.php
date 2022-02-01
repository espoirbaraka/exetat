<?php

$conn = $pdo->open();

$domaine = $conn->prepare("SELECT * FROM t_domaine");
$domaine->execute();

$pdo->close();
?>


<!-- edit -->
<div class="modal fade" id="editquestion">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" style="text-align: center;"><b>Editer la question</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              
          </div>
          <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/edit_question.php" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-sm-9">
                      <input type="hidden" name="id" class="codequestion">
                      <input type="text" id="question" name="question" class="form-control">
                    </div>
                </div>
          </div>  
          <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-primary btn-flat" name="edit"><i class="fa fa-save"></i> Modifier</button>
              </form>
          </div>
        </div>
    </div>
</div>



<!-- remove -->
<div class="modal fade" id="removequestion">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" style="text-align: center;"><b>Suppression de la question</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              
          </div>
          <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/delete_question.php" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-sm-9">
                      <input type="hidden" name="id" class="codequestion">
                      <h1 class="bold laquestion"></h1>
                    </div>
                </div>
          </div>  
          <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-danger btn-flat" name="remove"><i class="fa fa-remove"></i> Supprimer</button>
              </form>
          </div>
        </div>
    </div>
</div>






     