<?php

// $conn = $pdo->open();

// $marque = $conn->prepare("SELECT * FROM t_marque_imprimante");
// $marque->execute();
// $puissance = $conn->prepare("SELECT * FROM t_puissance_imprimante");
// $puissance->execute();
// $etat = $conn->prepare("SELECT * FROM t_etat_materiel");
// $etat->execute();
// $affectation = $conn->prepare("SELECT * FROM t_affectation");
// $affectation->execute();
// $couleur = $conn->prepare("SELECT * FROM t_couleur");
// $couleur->execute();

// $pdo->close();
?>
<!-- Add -->
<div class="modal fade" id="adduser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" style="text-align: center;"><b>Ajouter utilisateur</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="operation/add_user.php" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-sm-9">
                      <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                      <input type="text" id="postnom" name="postnom" class="form-control" placeholder="Postnom">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                      <input type="email" id="mail" name="mail" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                      <input type="password" id="password1" name="password1" class="form-control" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                      <input type="password" id="password2" name="password1" class="form-control" placeholder="Re-insere le password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" class="form-control">
                    </div>
                </div>
                
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Enregistrer</button>
              </form>
            </div>
        </div>
    </div>
</div>








     