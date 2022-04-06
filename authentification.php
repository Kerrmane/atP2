<?php 
session_start();
require('connexion.php');

    $mdp=$_GET['mdp'];
    //echo "Le mot de pass est : $mdp";
    $nomUtil=$_GET['nomUtil'];
    
        $req=$bdd->prepare("SELECT * FROM technicien WHERE numero_matricule='".$nomUtil."' AND nom_employe='".$mdp."';");
        $req->execute();
        $donne =$req->fetchAll(PDO::FETCH_OBJ);

        if ($donne!=NULL) 
        {
        // foreach ($donne as $moulaga){
        //     echo " <tr>
        //         <td>".$moulaga['prenom']."</td>
        //         <td>".$moulaga['passwords']."</td>
        //     </tr>" ;
        //     }
         $_SESSION['nomUtil']=$nomUtil;
         $_SESSION['mdp']=$mdp;

        header("Location: index.php" );
            echo "bienvenue $nomUtil";
        }
            else{
                header("Location: pageDeConnexion.php" ); ?>       
            <p style="color: red;">vous etes inconnus</p>
            <?php

        }
?>