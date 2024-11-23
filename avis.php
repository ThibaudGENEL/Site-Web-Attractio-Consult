<?php 
include 'entete.php';
include 'inc/connectBdd.php';
?>

<section>
<div class="container" style="margin-top:30px">
  <div class="row">
    <?php
        include 'asideA.php';
      ?>
    <div class="col-sm-8">
         <?php  
         try{
            $sql = 'SELECT * from avis where mailAuteur = :email ';// on écrit la requête sous forme de chaine de caractères
            $email = $_SESSION["email"];
            $resultat = $cnx->prepare($sql); //// on exécute la requête qui renvoie un curseur (pointeur sur le jeu d'enregistrements)
            $resultat->execute(array(":email" => $email));
            $tabloResultat=$resultat->fetchAll(PDO::FETCH_ASSOC);// on lit le contenu du curseur $résultat récupéré dans un tableau associatif 
            foreach($tabloResultat as $ligne)   { 
               echo "<article>";
               echo "<h3>".$ligne["mailAuteur"]."</h3>"."<br><h2>Parc n°".$ligne["idParc"]." :</h2>";
               echo "<br><p>Note : ".$ligne["nbEtoiles"]."/5"."</p>Avis :<p>".$ligne["avisDetail"]."</p><br><br>";   
               echo "</article>";   
         }
         $resultat->closeCursor();       // on ferme le curseur des résultats
         }
         catch(PDOException $e) {   // gestion des erreurs
            echo"ERREUR PDO  " . $e->getMessage();
         }
?>
    </div>
</div>
</div>
</section>
<?php
 include 'footer.html';
 ?>



