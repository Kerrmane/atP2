<?php
// $nInter=$_POST['nInter'];







use Dompdf\Dompdf;

use Dompdf\Options;

require_once 'connexion.php';

// $sql="SELECT * FROM client WHERE numero_client = $nclient ";

// $query=$bdd->query($sql);

// $client = $query->fetchAll();

ob_start();
require_once 'pdf-contenu.php';





$html = ob_get_contents();
ob_end_clean();

require_once 'dompdf/autoload.inc.php';


$dompdf = new Dompdf();


$dompdf->loadHtml($html);


$dompdf->render();


$fichier='fichedintervention.pdf';

$dompdf->stream($fichier);


?>