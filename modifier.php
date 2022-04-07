<?php

use FontLib\Table\Type\head;

session_start();
require('connexion.php');



if (isset($_POST['modifer'])){
    if (!empty($_POST['nclient']) && !empty($_POST['raisonsocial']) && !empty($_POST['codepostale']) && !empty($_POST['mail']) && !empty($_POST['ape']) && !empty($_POST['numerotelephone'])) {
        $nclient=$_POST['nclient'];
        $raisonsocial=$_POST['raisonsocial'];
        $codepostale=$_POST['codepostale'];
        $ape=$_POST['ape'];
        $mail=$_POST['mail'];
        $num=$_POST['numerotelephone'];
        

       $req=$bdd->query("UPDATE `client` SET `raison_sociale` = '$raisonsocial', `code_ape` = '$ape', `adresse_posatle` = '$codepostale', `numero_de_telephone` = '$num', `adresse_mail` = '$mail' WHERE `client`.`numero_client` = 1120;");
    
       $req->execute();
       header("location:table.php?succes=True");
       $bdd=null;
       
    }
    else {
        echo "erreur";
    }
    
    
}
?>




<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>page de modification</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body id="page-top">

    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>CashCAsh</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="table.php"><i class="fas fa-table"></i><span>Table</span></a></li>
                    
                    <li class="nav-item"></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            
                            
                            
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo $_SESSION['nomUtil']; ?></span><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="authentification.php?deconnexion=True"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
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
    <input type="number" name="nclient"   value="<?php echo $client['numero_client']?>" id="form5Example1" class="form-control" />
    
  </div>

   <!-- Raison social -->
   <div class="form-outline mb-3">
  <label class="form-label" for="form5Example1">Raison social</label>
    <input type="text"  name="raisonsocial" id="form5Example1" value="<?php echo $client['raison_sociale']?>" class="form-control" />
    
  </div>

   <!-- Code APE -->
   <div class="form-outline mb-3">
  <label class="form-label" for="form5Example1">Code APE</label>
    <input type="text" name="ape" id="form5Example1" value="<?php echo $client['code_ape']?>" class="form-control" />
    
  </div>

  

   <!-- Code postale -->
   <div class="form-outline mb-3">
  <label class="form-label" for="form5Example1">Code postale</label>
    <input type="number" name="codepostale" id="form5Example1" value="<?php echo $client['adresse_posatle']?>" class="form-control" />
    
  </div>

   <!-- Numero telephone -->
   <div class="form-outline mb-3">
  <label class="form-label" for="form5Example1">Numero telephone</label>
    <input type="number" name="numerotelephone"  id="form5Example1" value="<?php echo $client['numero_de_telephone']?>"  class="form-control" />
    
  </div>

   <!-- adresse mail -->
   <div class="form-outline mb-3">
  <label class="form-label" for="form5Example1">adresse mail</label>
    <input type="email" name="mail" id="form5Example1" value="<?php echo $client['adresse_mail']?>" class="form-control" />
    
  </div>

  <?php  endforeach ;  ?>

  
  

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4" name="modifer" value="submit">MODIFIER</button>
</form>
<?php  } ?> 
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script> 
</body>

</html>