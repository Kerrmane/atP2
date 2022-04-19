<?php session_start();  ?>
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

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image " style="background-image: url(&quot;assets/img/login2.png&quot;); background-repeat: no-repeat;
  background-size:80%;"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark my-5"> <i class="fa-solid fa-user "></i> Espace Admin</h4>
                                    </div>
                                    <form class="user" action="authentification.php" method="GET">
                                        <div class="my-3">
                                            <input id="exampleInputEmail" class="form-control form-control-user" type="text" aria-describedby="emailHelp" placeholder="Entrer le nom d'utilisateur" name="nomUtil" required/>
                                        </div>
                                        <div class="my-3">
                                            <input id="exampleInputPassword" class="form-control form-control-user" type="password" placeholder="Entrer le mot de passe" name="mdp" />
                                        </div>
                                    
                                        <div class="text-center col-md-12 my-3"><button class="btn btn-primary" type="submit" value="CONNEXION" name="connexion">Connexion</button>
                                        </div>
                                        <?php
                                        if (isset($_GET['error']))
                                         {
                                            if($_GET['error']==0) ?>
                                            <p style="color: red;">vous etes inconnus</p> 
                                       <?php  }
                                            ?>                                        
                                        
    
                                    </form>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>