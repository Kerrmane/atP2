<?php 
session_start();
require('connexion.php');
if (isset($_GET['deconnexion'])){
    if ($_GET['deconnexion']==TRUE){
        session_destroy();
        header("location:pagedeConnexion.php");
    }

}

    $mdp=$_GET['mdp'];
    //echo "Le mot de pass est : $mdp";
    $nomUtil=$_GET['nomUtil'];
    
        $req=$bdd->prepare("SELECT * FROM technicien WHERE numero_matricule='".$nomUtil."' AND nom_employe='".$mdp."';");
        $req->execute();
        $donne =$req->fetchAll(PDO::FETCH_OBJ);

        if ($donne!=NULL) 
        {
      
         $_SESSION['nomUtil']=$nomUtil;
         $_SESSION['mdp']=$mdp;

        header("Location: index.php" );
            
        }
            else{
                header("Location: pageDeConnexion.php?error=0" ); ?>       
            
            <?php

        }
?>