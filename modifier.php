<?php
session_start();
require('connexion.php');



?>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>
<body>
    <?php 
    if (isset($_GET['fiche']) && !empty($_GET['fiche'])){
        $fiche=$_GET['fiche'];
        
    $result = $bdd->query("SELECT * FROM Client WHERE numero_client =$fiche ");
    
        $result->execute();
        $clients = $result->fetchAll(); 
    ?>
    <?php  foreach ($clients as $client):?>
    <h1 class="text-center mt-4">Modification de fiche client</h1>
<form class=" my-5" style="width: 50%; margin:auto" method="POST" action="modifier.php">
  <!-- Numero client -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form5Example1">Numero client</label>
    <input type="text"  value="<?php echo $client['numero_client']?>" id="form5Example1" class="form-control" />
    
  </div>

   <!-- Raison social -->
   <div class="form-outline mb-3">
  <label class="form-label" for="form5Example1">Raison social</label>
    <input type="text" id="form5Example1" value="<?php echo $client['raison_sociale']?>" class="form-control" />
    
  </div>

   <!-- Code APE -->
   <div class="form-outline mb-3">
  <label class="form-label" for="form5Example1">Code APE</label>
    <input type="text" id="form5Example1" value="<?php echo $client['code_ape']?>" class="form-control" />
    
  </div>

   <!-- Code postale -->
   <div class="form-outline mb-3">
  <label class="form-label" for="form5Example1">Code postale</label>
    <input type="text" id="form5Example1" value="<?php echo $client['adresse_posatle']?>" class="form-control" />
    
  </div>

   <!-- Numero telephone -->
   <div class="form-outline mb-3">
  <label class="form-label" for="form5Example1">Numero telephone</label>
    <input type="text" id="form5Example1" value="<?php echo $client['numero_de_telephone']?>"  class="form-control" />
    
  </div>

   <!-- adresse mail -->
   <div class="form-outline mb-3">
  <label class="form-label" for="form5Example1">adresse mail</label>
    <input type="text" id="form5Example1" value="<?php echo $client['adresse_mail']?>" class="form-control" />
    
  </div>

  <?php  endforeach ; ?>

  
  

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4 ">MODIFIER</button>
</form>
    
</body>
<?php } else {
    header("location:table.php");
} ?>
</html>