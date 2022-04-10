<?php 
session_start();
require('connexion.php');

$ninter=$_SESSION['ninter'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
</head>
<body>
    <?php
    if (isset($ninter))
    {
        $result = $bdd->query("SELECT * FROM intervention WHERE Numero_Intervention =$ninter ");
        $result->execute();
        $ninters = $result->fetchAll();
    ?>
    <h1 style="text-align: center;">Fiche d'intervention</h1>
    <hr>
    <h3>cashcash</h3>
    <h4>78 Rue Molinel Lille, France</h4>
    <h4>TEL:07.98.47.63.82</h4>
    <h4>Mail:cashcash@gmail.com</h4>
    <h4>N Siren:465467657654654</h4>
    <h4>78 Rue Molinel Lille, France</h4>
    <hr>
    
            <?php foreach ($ninters as $ninter): ?>
                <p>numero d'intervention : <?=$ninter['Numero_Intervention']?></p> 
                <p>date de visite : <?=$ninter['Date_Visite']?></p>
                <p>heure de visite : <?=$ninter['Heure_Visite']?></p>
                <p>Numero de matricule : <?=$ninter['numero_matricule']?></p>
                <p>nmero client : <?=$ninter['numero_client']?></p>
            <?php endforeach; ?>
       
    <hr>

<?php
 
} 
;
?>  
</body>
</html>