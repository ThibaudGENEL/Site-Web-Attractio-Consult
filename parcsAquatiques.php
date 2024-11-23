<?php 
include 'entete.php';
include 'inc/connectBdd.php';
?>

<section>
<div class="container" style="margin-top:30px">
  <div class="row">
    <?php
        include 'aside.php';
      ?>
    <div class="col-sm-8">
        <u><h1>Parcs aquatiques</h1></u><br><br>
         <?php  
         $sql = 'SELECT * from parc where type="A"';// on écrit la requête sous forme de chaine de caractères
         try{
            $resultat = $cnx->query($sql); //// on exécute la requête qui renvoie un curseur (pointeur sur le jeu d'enregistrements)
            $tabloResultat=$resultat->fetchAll(PDO::FETCH_ASSOC);// on lit le contenu du curseur $résultat récupéré dans un tableau associatif 
            foreach($tabloResultat as $ligne)   { 
              echo "<article>";
               echo "<h1>".$ligne["nom"]."</h1>"."<br><h2>".$ligne["libelle"]."</h2>";
               echo " <img  src=".$ligne["image"]." width=700 >"; 
               echo "<br><p>".$ligne["pays"]."</p><br><p>".$ligne["description"]."</p><br><br>";   
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
</body>
</html>



