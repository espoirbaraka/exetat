<?php
require('fpdf/fpdf.php');
require_once'../admin/includes/conn.php';
$conn = $pdo->open();
class PDF extends FPDF
{
// En-tête
function Header()
{
    // Logo
    $this->Image('img/logo.png',2,2,206,10);
    // Police Arial gras 15
    $this->SetFont('Arial','B',15);
    // Décalage à droite
    $this->Cell(30);
    // Titre
    // $this->Cell(180,10,'Titre',1,0,'C');
    // Saut de ligne
    $this->Ln(5);
}

// Tableau simple
function BasicTable($header, $data)
{
    // En-tête
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Données
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}







// function headerTable(){
//     $this->setFont('Times','B',8);
//     $this->cell(95,10,'Section: ',1,0,'L');
//     $this->Ln();
// }


function montant($conn){
    $section = $_GET['section'];
    $domaine = $_GET['domaine'];
    $req=$conn->prepare("SELECT * FROM t_question
                        INNER JOIN t_section
                        ON t_question.CodeSection=t_section.IdSection
                        INNER JOIN t_cours
                        ON t_question.CodeCours=t_cours.CodeCours
                        INNER JOIN t_domaine
                        ON t_cours.CodeDomaine=t_domaine.IdDomaine
                        WHERE t_question.CodeSection=? AND t_domaine.IdDomaine=?");
	$params=array($section, $domaine);
	$req->execute($params);
    while($data = $req->fetch(PDO::FETCH_OBJ))
    {
        $this->cell(195,10,'QUESTION:     '.$data->Question,1,0,'L');
        $this->Ln();

        $id2 = $data->CodeQuestion;
        $req2=$conn->prepare("SELECT * FROM t_reponse WHERE CodeQuestion=? ORDER BY CodeReponse");
        $params2=array($id2);
        $req2->execute($params2);
        while($data2 = $req2->fetch(PDO::FETCH_OBJ))
        {
            $this->cell(39,10,$data2->CodeAssertion.': '.$data2->Reponse,1,0,'L');
            // $this->Ln();
            
        }

        $this->Ln();

        // $this->cell(55,10,'Date de paiement:',1,0,'C');
        // $this->cell(55,10,$data->DatePaiement,1,0,'C');
        // $this->cell(55,10,'Montant cotise:',1,0,'C');
        // $this->cell(15,10,$data->MontantPaiement,1,0,'C');
        // $this->Ln();

        // $this->cell(55,10,'Pour:',1,0,'C');
        // $this->cell(125,10,$data->nom.' '.$data->postnom.' '.$data->prenom,1,0,'C');
        // $this->Ln();


        // $this->cell(55,10,'Periode:',1,0,'C');
        // $this->cell(125,10,$data->DesignationMois.' '.$data->DesignationAnnee,1,0,'C');
        // $this->Ln();
    }
}


function viewTable($conn){
    $this->setFont('Times','B',12);
}







}

    // Instanciation de la classe dérivée
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->SetFont('Arial','B',8);
    $pdf->AddPage();
    // $pdf->headerTable();
    $pdf->montant($conn);
    
    $pdf->viewTable($conn);
    $pdf->Cell(0,10,'MINISTERE DE L\'EPST, le '.date('d-m-Y'),0,1);
    $pdf->Output();
?>