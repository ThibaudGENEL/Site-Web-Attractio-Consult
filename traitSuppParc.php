<?php
include "inc/connectBdd.php";
include "entete.php";

if ($_POST["listeParc"]=="") {
    echo "Choisir un Parc est obligatoire";
}
else{
    try{
    $sql="SELECT id FROM parc WHERE nom = :nom";
    $res = $cnx->prepare($sql);
    $nom = $_POST["listeParc"];
    $res->execute(array(":nom" => $nom));
    $getId = $res->fetch(PDO::FETCH_BOTH);
    $sql ="DELETE FROM AVIS WHERE idParc = :id";
    $res = $cnx->prepare($sql);
    $nbLignes = $res->execute(array(":id" => $getId[0]));
    $sql ="DELETE FROM PARC WHERE id = :id";
    $res = $cnx->prepare($sql);
    $nbLignes = $res->execute(array(":id" => $getId[0]));
    }
    catch(PDOException $e) {   // gestion des erreurs
        echo"ERREUR dans l'ajout  " . $e->getMessage();
        echo "<br>Erreur critique";
    }
    echo "le parc ".$nom." a bien été supprimé du site.";
}
echo "<br><br>";
include "footer.html";
?>