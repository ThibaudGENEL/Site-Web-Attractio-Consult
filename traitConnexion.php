<?php 
// include
session_start();
include "inc/connectBdd.php";

if(isset($_POST["email"]) && isset($_POST["mdp"])){

if ($_POST["email"]=="") {
    echo "Veuillez entrer un Email";
}
elseif ($_POST["mdp"]=="") {
    echo "Veuillez entrer un mot de passe";
}
    else {
        try {
            $sql="SELECT admin FROM utilisateur where mail = :email and mdp = :mdp";
            $res = $cnx->prepare($sql);
            $email = $_POST["email"];
            $mdp = $_POST["mdp"];
            $res->execute(array(":email" => $email,":mdp" => $mdp ));
            $resultat = $res->fetch(PDO::FETCH_BOTH);
            if(!empty($resultat)){
                $_SESSION["email"]=$email;
                $_SESSION["admin"]=$resultat[0];
            }
    
        }

        catch(PDOException $e) {   // gestion des erreurs
            echo"ERREUR dans l'ajout  " . $e->getMessage();
            echo "<br>Votre adresse mail est déjà associée à un compte !";
        }
        header('Location: index.php');

    }
}
?>
