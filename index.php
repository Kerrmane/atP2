<?php
session_start();
require('connexion.php');



if (!isset($_SESSION['mdp']) && !isset($_SESSION['nomUtil'])) {
    header("location:pageDeConnexion.php");
    
}
$result = $bdd->query("SELECT * FROM technicien  ");

        $result->execute();
        $techs = $result->fetchAll();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <script src="https://kit.fontawesome.com/5614afca26.js" crossorigin="anonymous"></script>
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
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                                    <span class="d-none d-lg-inline me-2 text-gray-600 small">
                                    <?php echo"connexion autant que ".$_SESSION['role'] . " &nbsp " . $_SESSION['nomUtil']?>  </span>
                                <img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="authentification.php?deconnexion=True"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <h2 class="text-dark mx-4">Dashboard</h2>
                <h3 class="my-3 mx-4">outil statique</h3>
        
                <form method="POST" action="index.php">
                <div class="row mx-4">

                   <div class="col-md-3  ">
                    <label><b> Le technecien : </b></label>
                    <select name="tech" id="" required="required">
                    <?php foreach ($techs as $tech): ?>
                        <option value="<?php echo $tech['numero_matricule']?>" ><?php echo $tech['nom_employe']?></option>
                        
                        <?php endforeach ;
                         ?>
                    </select>
                   </div>
                   <div class="col-md-3 ">
                   <label><b> Depuis : </b></label>
                   <input type="date" name="debut" min="2022-01-01" required="required">
                    </div> 

                   <div class="col-md-3 ">
                   <label><b>Jusqu'à : </b></label>
                    <input type="date" name="jusqu" max="2022-12-31" required="required">
                   </div>

                   <div class="col-md-3 ">
                  <button type="submit" name="envoyer" class="btn btn-primary">Envoyer</button>
                  </div> 

                </div>
                </form>
                <?php if (isset($_POST['envoyer'])) {
            
            ?>
                <?php 

                // on recuper les données du formulaire
                $tech=$_POST['tech'];
                $debut=$_POST['debut'];
                $fin=$_POST['jusqu'];

                // on calcule le nombre effectuer par chaque technecien 
                $sql = "SELECT COUNT(Numero_Intervention) FROM intervention 
                WHERE numero_matricule='$tech' AND Date_Visite BETWEEN '$debut' AND '$fin';";
                $res = $bdd->query($sql);
                $countIntervention = $res->fetchColumn();

                // on calcule le temps passer pour tout les interventions pour un seul tech
                $rqt="SELECT SUM(Temps_passe) FROM `controle` INNER JOIN intervention ON intervention.Numero_Intervention = controle.Numero_Intervention WHERE intervention.numero_matricule=$tech;";
                $exct =$bdd->query($rqt);
                $totalMn =$exct->fetchColumn();

                // on calcule le totale de jillometrage parcouru par un technicien 
                $rqt2="SELECT DISTINCT SUM(client.Distance_KM)    FROM intervention INNER JOIN client ON client.numero_client=intervention.numero_client WHERE intervention.numero_matricule = $tech";
                $exct2 =$bdd->query($rqt2);
                $totalKm =$exct2->fetchColumn();

                // on calcule le total la duree de deplacement pour un tech 
                $rqt3="SELECT DISTINCT SUM(client.Duree_deplacement)    FROM intervention INNER JOIN client ON client.numero_client=intervention.numero_client WHERE intervention.numero_matricule = $tech";
                $exct3 =$bdd->query($rqt3);
                $totalDeplacelent =$exct3->fetchColumn();

                ?>

                <section id="static">
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="bg-dark  text-white text-center ">
                                <h5 class="py-3"><i class="fa-solid fa-user "></i> <?php echo $tech ;?> </h5>

                            </div>
                        </div>
                     </div> <!-- row -->

                </div>
            <div class="container-fluid ">
                <div class="row">

                <!-- Column -->
                <div class="col-md-8 col-lg-3 col-xlg-2 ">
                    <div class="card card-hover">
                        <div class="box bg-warning text-center ">
                        <h1 class="font-light text-white my-4"><?php echo  $countIntervention ; ?></h1>
                        <h6 class="text-white">Interventions</h6>
                        <p>Nombre d'intervention éffectué</p>
                        </div>
                    </div>
                </div>

            <!-- Column -->
                <div class="col-md-8 col-lg-3 col-xlg-2">
                    <div class="card card-hover ">
                        <div class="box bg-danger text-center">
                        <h1 class="font-light text-white my-4"><?php echo $totalKm ;?></h1>
                        <h6 class="text-white">Killométre</h6>
                        <p>Nombre de kilometre parcourus</p>
                        </div>
                    </div>
                </div>

                <!-- Column -->
                <div class="col-md-8 col-lg-3 col-xlg-2">
                    <div class="card card-hover">
                        <div class="box bg-info text-center ">
                        <h1 class="font-light text-white my-4"><?php echo $totalMn ; ?></h1>
                        <h6 class="text-white">Minute</h6>
                        <p>Durée passé en controle </p>
                        </div>
                    </div>
                </div>

                <!-- Column -->
            <div class="col-md-8 col-lg-3 col-xlg-2">
              <div class="card card-hover">
                <div class="box bg-primary text-center">
                  <h1 class="font-light text-white my-4"><?php echo $totalDeplacelent ; ?></h1>
                  <h6 class="text-white">Minutes</h6>
                  <p>Passer en deplacement</p>
                </div>
              </div>
            </div>
            <!-- Column -->

             </div><!--row -->
        </div>
     </div><!-- wrawer -->
</section>
<?php } ?>

    
            

            
            <footer class="bg-white sticky-footer ">
                <div class="container my-auto fixed-bottom">
                    <div class="text-center my-auto copyright"><span>Copyright © CashCash 2022</span></div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>