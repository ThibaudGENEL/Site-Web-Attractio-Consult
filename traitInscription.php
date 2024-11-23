<?php 
// include
include 'entete.php';
include "inc/connectBdd.php";

if ($_POST["mail"]=="") {
    echo "Le mail est obligatoire";
}
elseif ($_POST["mdp"]=="") {
    echo "Mot de passe invalide";
}
elseif (!isset($_POST['CGU'])) {
   echo "<p>Vous devez accepter les conditions générales d'utilisation pour vous inscrire</p>";
}
else {
try {
    $sql="insert into UTILISATEUR(mail, mdp,admin) values(:mail,:mdp, 1)";
    $resultat = $cnx->prepare($sql);
    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];
    $nbLignes= $resultat->execute(array(":mail" => $mail,":mdp" => $mdp ));
    //echo $nbLignes. "ligne ajoutée";
    header('Location:formConnexion.php');
}
    
catch(PDOException $e) {   // gestion des erreurs
    echo"ERREUR dans l'ajout  " . $e->getMessage();
    echo "<br>Votre adresse mail est déjà associée à un compte !";
}

}
echo "<br><br>";
include "footer.html";
?>


