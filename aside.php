<div class="container p-3 my-3 bg-dark text-white" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-3">
      <form name="Recherche" method="get" action="traitRechercheP.php">
        <button class="btn btn-info btn-block" name="ordrePref" type="submit">Afficher les parcs par ordre de préférence des votants</button><br>
        <button class="btn btn-info btn-block" name="parPays" type="submit">Afficher les parcs classés par pays</button> <br>
            <select name="listePays" class="custom-select">
              <option selected>Choisir un pays..</option>
              <?php 
              include "inc/connectBdd.php";
              $sql = "SELECT distinct pays from parc";
              try {
                $res = $cnx->query($sql);
                $tabloRes=$res->fetchAll(PDO::FETCH_ASSOC);
                foreach ($tabloRes as $ligne) {
                  echo "<option value='".$ligne["pays"]."'>".$ligne["pays"]."</option>";
                }
              }
              catch(PDOException $e) {   // gestion des erreurs
                echo"ERREUR PDO  " . $e->getMessage();
               }
              ?>
            </select><br>
          <button name="uniquePays" type="submit" class="btn btn-info btn-block">Voir les parcs de ce pays</button><br>  <br>
          <button class="btn btn-info btn-block" name="notesEtAvis" type="submit">Afficher les parcs avec notes et avis</button>  <br>  
          <select name="listeParc" class="custom-select">
              <?php 
              $sql = "SELECT distinct nom from parc";
              try {
                $res = $cnx->query($sql);
                $tabloRes=$res->fetchAll(PDO::FETCH_ASSOC);
                foreach ($tabloRes as $ligne) {
                  echo "<option value='".$ligne["nom"]."'>".$ligne["nom"]."</option>";
                }
              }
              catch(PDOException $e) {   // gestion des erreurs
                echo"ERREUR PDO  " . $e->getMessage();
               }
              ?>
            </select><br>
        <button name="uniqueParc" type="submit" class="btn btn-info btn-block">Voir les avis sur ce parc</button><br>  <br>  

      </form>
    </div>