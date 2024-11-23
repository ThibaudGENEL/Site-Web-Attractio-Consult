<?php 
// include
include 'entete.php';
include "inc/connectBdd.php";

if ($_POST["listeParc"]=="") {
    echo "Choisir un Parc est obligatoire";
}
elseif ($_POST["listeNote"]=="") {
    echo "Note non completé";
}
else {
try {
    $sql="SELECT id FROM parc WHERE nom = :nom";
    $res = $cnx->prepare($sql);
    $nom = $_POST["listeParc"];
    $res->execute(array(":nom" => $nom));
    $getId = $res->fetch(PDO::FETCH_BOTH);
    $sql="insert into AVIS(avisDetail, idParc, mailAuteur, nbEtoiles) values(:avis,:id,:mailA,:note)";
    $res = $cnx->prepare($sql);
    $email = $_SESSION["email"];
    $note = $_POST["listeNote"];
    $avis = $_POST["avis"];
    $nbLignes = $res->execute(array(":avis" => $avis,":id" => $getId[0],":mailA" => $email,":note" => $note));
    //echo $nbLignes. "ligne ajoutée";
    header('Location:avis.php');
}
    
catch(PDOException $e) {   // gestion des erreurs
    echo"ERREUR dans l'ajout  " . $e->getMessage();
    echo "<br>Erreur critique, Vous avez deja poster un avis pour ce Parc !";
}

}
echo "<br><br>";
include "footer.html";
?>
