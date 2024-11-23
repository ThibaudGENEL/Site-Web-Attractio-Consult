<?php 
// include
include 'entete.php';
include "inc/connectBdd.php";

if (empty($_POST["nom"])) {
    echo "Le nom est obligatoire";
}
elseif ($_POST["type"]!="S" && $_POST["type"]!="A") {
    echo "Vous devez sélectionner le type du parc";
}
elseif (empty($_POST["libelle"])) {
   echo "<p>Le libelle est obligatoire</p>";
}
elseif (empty($_POST["pays"])) {
    echo "<p>Le pays est obligatoire</p>";
 }
 elseif (empty($_POST["description"])) {
    echo "<p>La description est obligatoire</p>";
 }
else {
try {
    $sql="insert into PARC(nom, type,libelle, image, pays, description) values(:nom,:type, :libelle, :image, :pays, :description)";
    $image="images/".$_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"], $image);
    $resultat = $cnx->prepare($sql);
    $tablo= $resultat->execute(array(":nom" => $_POST["nom"],":type" => $_POST["type"], ":libelle" => $_POST["libelle"], "image" => $image, ":pays" => $_POST["pays"], ":description" => $_POST["description"] ));
    //? header('Location:formAjoutParc.php');
    echo "<p> Le parc ".$_POST["nom"]." a bien été ajouté à la base de données.";
}
    
catch(PDOException $e) {   // gestion des erreurs
    echo"ERREUR dans l'ajout  " . $e->getMessage();
}

}
echo "<br><br>";
include "footer.html";
?>