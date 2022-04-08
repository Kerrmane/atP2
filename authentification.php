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
    
    $nomUtil=$_GET['nomUtil'];
    
        $req=$bdd->prepare("SELECT * FROM utilisateurs WHERE nomUtil='".$nomUtil."' AND mdp='".$mdp."';");
        $req->execute();
        $donne =$req->fetchAll();

        if ($donne!=NULL) 

        {
            foreach ($donne as $colone):

                $role=$colone['role'];
            endforeach ;
         $_SESSION['nomUtil']=$nomUtil;
         $_SESSION['mdp']=$mdp;
         $_SESSION['role']=$role;
         

        header("Location: index.php" );
            
        }
            else{
                header("Location: pageDeConnexion.php?error=0" ); ?>       
            
            <?php

        }
?>