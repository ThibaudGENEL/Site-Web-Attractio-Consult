<?php 
// include
include 'entete.php';
include "inc/connectBdd.php"; ?>
<section>
<div class="container" style="margin-top:30px">
  <div class="row">
    <?php
        include 'aside.php';
      ?>
    <div class="col-sm-8">
<?php
if (isset($_GET["ordrePref"])) {
   $Sql = 'SELECT distinct parc.nom, parc.libelle, parc.image, parc.pays, parc.description from parc, avis WHERE parc.id = avis.idParc ORDER BY nbEtoiles DESC';// on écrit la requête sous forme de chaine de caractères
        try{
           $resultat = $cnx->query($Sql); //// on exécute la requête qui renvoie un curseur (pointeur sur le jeu d'enregistrements)
           $tabloResultat=$resultat->fetchAll(PDO::FETCH_ASSOC);// on lit le contenu du curseur $résultat récupéré dans un tableau associatif
           foreach($tabloResultat as $ligne)   {
             echo "<article>";
              echo "<h1>".$ligne["nom"]."</h1>"."<br><h2>".$ligne["libelle"]."</h2>";
              echo " <img  src=".$ligne["image"]." width=700 >";
              echo "<br><p>".$ligne["pays"]."</p><brs><p>".$ligne["description"]."</p><br><br>";  
              echo "</article>";  
               }
        $resultat->closeCursor();       // on ferme le curseur des résultats
           }
        catch(PDOException $e) {   // gestion des erreurs
           echo"ERREUR PDO  " . $e->getMessage();
        }
}

if (isset($_GET["parPays"])) {
    $Sql = 'SELECT * from parc ORDER BY pays DESC';// on écrit la requête sous forme de chaine de caractères
         try{
            $resultat = $cnx->query($Sql); //// on exécute la requête qui renvoie un curseur (pointeur sur le jeu d'enregistrements)
            $tabloResultat=$resultat->fetchAll(PDO::FETCH_ASSOC);// on lit le contenu du curseur $résultat récupéré dans un tableau associatif 
            foreach($tabloResultat as $ligne)   { 
              echo "<article>";
               echo "<h1>".$ligne["nom"]."</h1>"."<br><h2>".$ligne["libelle"]."</h2>";
               echo " <img  src=".$ligne["image"]." width=700 >"; 
               echo "<br><p>".$ligne["pays"]."</p><brs><p>".$ligne["description"]."</p><br><br>";   
               echo "</article>";   
                }
         $resultat->closeCursor();       // on ferme le curseur des résultats
            }
         catch(PDOException $e) {   // gestion des erreurs
            echo"ERREUR PDO  " . $e->getMessage();
         }
}
if (isset($_GET["notesEtAvis"])) {
   $Sql = 'SELECT * from parc, avis WHERE parc.id = avis.idParc GROUP BY parc.id';// on écrit la requête sous forme de chaine de caractères
        try{
           $resultat = $cnx->query($Sql); //// on exécute la requête qui renvoie un curseur (pointeur sur le jeu d'enregistrements)
           $tabloResultat=$resultat->fetchAll(PDO::FETCH_ASSOC);// on lit le contenu du curseur $résultat récupéré dans un tableau associatif
           foreach($tabloResultat as $ligne)   {
             echo "<article>";
              echo "<h1>".$ligne["nom"]."</h1>"."<br><h2>".$ligne["libelle"]."</h2>";
              echo " <img  src=".$ligne["image"]." width=700 >";
              echo "<br><p>".$ligne["pays"]."</p><brs><p>".$ligne["description"]."</p><br>";
              echo "<h3>".$ligne["mailAuteur"]."</h3>"."<br><h2>Parc n°".$ligne["idParc"]." :</h2>";
              echo "<br><p>Note : ".$ligne["nbEtoiles"]."/5"."</p>Avis :<p>".$ligne["avisDetail"]."</p><br><br>"; 
              echo "</article>";  
               }
        $resultat->closeCursor();       // on ferme le curseur des résultats
           }
        catch(PDOException $e) {   // gestion des erreurs
           echo"ERREUR PDO  " . $e->getMessage();
        }
}

if (isset($_GET["uniquePays"])) {
    $Sql = 'SELECT * from parc WHERE pays = :pays';// on écrit la requête sous forme de chaine de caractères
         try{
            $resultat = $cnx->prepare($Sql); //// on exécute la requête qui renvoie un curseur (pointeur sur le jeu d'enregistrements)
            $resultat->execute(array(":pays" => $_GET["listePays"]));
            $tabloResultat=$resultat->fetchAll(PDO::FETCH_ASSOC);// on lit le contenu du curseur $résultat récupéré dans un tableau associatif 
            foreach($tabloResultat as $ligne)   { 
              echo "<article>";
               echo "<h1>".$ligne["nom"]."</h1>"."<br><h2>".$ligne["libelle"]."</h2>";
               echo " <img  src=".$ligne["image"]." width=700 >"; 
               echo "<br><p>".$ligne["pays"]."</p><brs><p>".$ligne["description"]."</p><br><br>";   
               echo "</article>";   
                }
         $resultat->closeCursor();       // on ferme le curseur des résultats
            }
         catch(PDOException $e) {   // gestion des erreurs
            echo"ERREUR PDO  " . $e->getMessage();
         }
}
if (isset($_GET["uniqueParc"])){
   try{
      echo $_GET["listeParc"]." :";
      $sql = 'SELECT id from parc WHERE nom = :nom';
      $res = $cnx->prepare($sql);
      $nom = $_GET["listeParc"];
      $res->execute(array(":nom" => $nom));
      $id = $res->fetch(PDO::FETCH_BOTH);
      $sql = 'SELECT * from avis WHERE idParc = :id';
      $res = $cnx->prepare($sql);
      $res->execute(array(":id" => $id[0]));
      $tabres = $res->fetchAll(PDO::FETCH_ASSOC);
      foreach($tabres as $ligne)   { 
         echo "<article>";
         echo "<br><h3>".$ligne["mailAuteur"]."</h3>"."<br>";
         echo "Note :".$ligne["nbEtoiles"]."/5"."<br>Avis :<p>".$ligne["avisDetail"]."</p><br>";   
         echo "</article>";  
         }
      $res->closeCursor();
      }  
   catch(PDOException $e) {   // gestion des erreurs
      echo"ERREUR PDO  " . $e->getMessage();
   }
} 
         ?>
         </div>
     </div>
     </div>
</section>
<?php
      include 'footer.html';
?>