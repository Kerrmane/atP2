<?php
session_start();
require('connexion.php');


if (!isset($_SESSION['mdp']) && !isset($_SESSION['nomUtil'])){
    header("location:pageDeConnexion.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>
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
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3"><span>CashCAsh</span>
                    </div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="table.html"><i class="fas fa-table"></i><span>Table</span></a></li>
                    
                    <li class="nav-item"></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid">
                        <button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button">
                            <i class="fas fa-bars"></i></button>
                        
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
             
       
     <!-- partie tableau fiche client et la modification            -->
        <div class="table-responsive  mx-5" id="dataTable" role="grid"aria-describedby="dataTable_info">
            <h2>Rechercher une fiche client</h2>
            <form method="POST" action="table.php">         
            <div class="input-group my-2 "style="width:40%;">
            <input type="text" class="form-control rounded" placeholder="Saisir le N fiche client" aria-label="Search" aria-describedby="search-addon" name="ficheClient" />
            <button type="submit" class="btn btn-outline-primary">chercher</button>
        </div>
        </form>
        <?php 
        if (isset($_GET['succes'])){
        if ($_GET['succes']==True){

        ?>
        <p class="text-success">modification avec success</p>
        <?php }
        }
        ?>
        <?php
        if (isset($_POST['ficheClient']) && !empty($_POST['ficheClient']))
        {
        $fiche= $_POST['ficheClient'] ;



        $result = $bdd->query("SELECT * FROM Client WHERE numero_client LIKE '%$fiche%' ");

        $result->execute();
        $clients = $result->fetchAll();
        ?>
        <div class="input-group">

        <table class="table my-0" id="dataTable">
            <thead>
                <tr>
                    <th>N client</th>
                    <th>raison Sociale</th>
                    <th>Code APE</th>
                    <th>code postale</th>
                    <th>N TEL</th>
                    <th>mail</th>
                </tr>
            </thead>

            <tbody>
            <?php  foreach ($clients as $client):?>
                <tr>

                    <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar4.jpeg"><?php echo $client['numero_client']?></td>
                    <td><?php echo $client['raison_sociale']?></td>
                    <td><?php echo $client['numero_de_siren']?></td>
                    <td><?php echo $client['adresse_posatle']?></td>
                    <td><?php echo"0".$client['numero_de_telephone']?></td>
                    <td><?php echo $client['adresse_mail'] ?></td>

                    <td>
                        <button class="btn btn-primary" >
                        <a href="modifier.php?fiche=<?php echo $client['numero_client']?>" style="color:aliceblue">modifier</a>
                        </button>
                    </td>

                </tr>

            <?php  endforeach ;?>

            </tbody>


        </table>
        </div>
        <?php }?>
<!-- Fin  partie tableau fiche client et la modification            -->

<!-- paartie de intervention et la generation du pdf -->
        <div class="table-responsive" id="dataTable" role="grid"aria-describedby="dataTable_info">
            <h2>Rechercher une intervention</h2>
            <form method="POST" action="table.php">         
                <div class="input-group my-2 "style="width:40%;">
                    <input type="text" class="form-control rounded" placeholder="Saisir le N d'intervention" aria-label="Search" aria-describedby="search-addon" name="ninter" />
                    <button type="submit" class="btn btn-outline-primary">chercher</button>
                </div>
            </form>   
        </div>
        <?php
        if (isset($_POST['ninter']) && !empty($_POST['ninter']))
        {
        $ninter= $_POST['ninter'] ;
        $result = $bdd->query("SELECT * FROM intervention WHERE Numero_Intervention LIKE '%$ninter%' ");

        $result->execute();
        $inters = $result->fetchAll();
        foreach ($inters as $ninter): 
        ?>
        <div class="input-group">
            <table class="table my-0" id="dataTable">
                <thead>
                    <tr>
                        <th>N Intervention</th>
                        <th>Date </th>
                        <th>Heure</th>
                        <th>N matricule</th>
                        <th>N Client</th>
                        <th>action</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar4.jpeg"><?php echo $ninter['Numero_Intervention']?></td>
                        <td><?php echo $ninter['Heure_Visite']?></td>
                        <td><?php echo $ninter['Date_Visite']?></td>
                        <td><?php echo$ninter['numero_matricule']?></td>
                        <td><?php echo $ninter['numero_client'] ?></td>
                        <td><button class="btn btn-primary" ><a href="pdf.php" style="color:aliceblue">pdf</a></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php
        $_SESSION['ninter']=$ninter['Numero_Intervention'];
         endforeach ; } ?>
        </div>
    </div>

        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © CashCash 2022</span>
                </div>
            </div>
        </footer>
        

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
