<?php
session_start();
require('connexion.php');


if (!isset($_SESSION['mdp']) && !isset($_SESSION['nomUtil'])){
    header("location:pageDeConnexion.php");
}
$result = $bdd->query("SELECT * FROM technicien  ");

        $result->execute();
        $techs = $result->fetchAll();
?>
?>
<!DOCTYPE html>
<html>

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
                    <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
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
                          </li>
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


                <section>

                <div class="container col-6 ">
                <div class="row justify-content-center ">
            
                <div class="card shadow-lg o-hidden border-0 my-5">
                    
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center ">
                                        <h4 class="text-dark my-5"> <i class="fa-solid fa-user "></i> Espace Admin</h4>
                                    </div>
                                    <form class="user" action="authentification.php" method="GET">
                                        <div class="my-3">
                                            <input id="exampleInputEmail" class="form-control form-control-user" type="text" aria-describedby="emailHelp" placeholder="Entrer le nom d'utilisateur" name="nomUtil" required/>
                                        </div>

                                        <div class="my-3">
                                            <input id="exampleInputPassword" class="form-control form-control-user" type="password" placeholder="Entrer le mot de passe" name="mdp" />
                                        </div>

                                        <div class="my-3">
                                        
                                        <select name="tech" class="form-control form-control-user" required="required">
                                        <?php foreach ($techs as $tech): ?>
                                        <option value="<?php echo $tech['numero_matricule']?>"   ><?php echo $tech['nom_employe']?></option>

                                        <?php endforeach ;
                                        ?>
                                        </select>
                                        </div>

                                        <div class="my-3">
                                            <select name="" id="" class="form-control form-control-user">
                                            <option value="tech" >technicien</option>
                                            <option value="admin">Gestionnaire</option>
                                            </select>
                                            
                                        </div>
                                    
                                        <div class="text-center col-md-12 my-3"><button class="btn btn-primary" type="submit" value="CONNEXION" name="connexion">S'enregistrer</button>
                                        </div>
                                        
                                        
                                                                               
                                        
    
                                    </form>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                </section>
                
                        
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