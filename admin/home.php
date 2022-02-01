<?php
include("includes/sessionconnected.php");

include("includes/head.php");

include("includes/navbar_menubar.php");
?>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="home.php">Acceuil</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-list fa-3x"></i>
            <div class="info">
              <h4>Questions</h4>
              <?php
              $stmt = $conn->prepare("SELECT COUNT(CodeQuestion) as nbre FROM t_question");
              $stmt->execute();
              $row = $stmt->fetch();
              $nbre=$row['nbre'];
              ?>
              <p><b><?php echo $nbre; ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-book fa-3x"></i>
            <div class="info">
              <h4>Cours</h4>
              <?php
              $stmt = $conn->prepare("SELECT COUNT(CodeCours) as nbre FROM t_cours");
              $stmt->execute();
              $row = $stmt->fetch();
              $nbre2=$row['nbre'];
              ?>
              <p><b><?php echo $nbre2; ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Sections</h4>
              <?php
              $stmt = $conn->prepare("SELECT COUNT(IdSection) as nbre FROM t_section");
              $stmt->execute();
              $row = $stmt->fetch();
              $nbre3=$row['nbre'];
              ?>
              <p><b><?php echo $nbre3; ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-user fa-3x"></i>
            <div class="info">
              <h4>Eleves inscrits</h4>
              <?php
              $stmt = $conn->prepare("SELECT COUNT(CodeEleve) as nbre FROM t_eleve");
              $stmt->execute();
              $row = $stmt->fetch();
              $nbre4=$row['nbre'];
              ?>
              <p><b><?php echo $nbre4; ?></b></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-7">
          <div class="tile">
            <h3 class="tile-title">Questions par cours</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="tile">
            <h3 class="tile-title">Notre objectif</h3>
            <div class="tile-body">Cette application sert comme aide-memoire aux finalistes de la 6è des humanités sur toute l'ettendue de la République. <br><br>Enfin cet outil donne la possibilité à toute personne habilleté de poster les questionnaires tout en se rassurant qu'il complete aussi les bonnes réponses. <br><br>Quant aux élèvès, ils peuvent s'exercer en temps réél et télécharger les fichiers PDF des questionnaires. <br><br><br> BIENVENUE</div>
            <div class="tile-footer"><a class="btn btn-primary" href="#">Aller sur le site</a></div>
          </div>
        </div>
      </div>
    </main>
   <?php
   include("includes/script.php");
   ?>