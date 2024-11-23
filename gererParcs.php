<?php 
include 'entete.php';
include 'inc/connectBdd.php';
?>

<section>
<div class="container bg-dark text-white" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-10">
      <u><h1>Ajouter un parc</h1></u><br><br>
    <form name="ajoutParc" method="post" action="traitAjoutParc.php " enctype="multipart/form-data">
        <input name="nom" type="text" placeholder="Nom.." class="form-control"> <br>
        <select name="type" class="custom-select">
          <option selected>Type de parc..</option>
          <option value="S">Sensations fortes</option>
          <option value="A">Aquatique</option>
        </select> <br><br>
        <input name="libelle" class="form-control" type="text" placeholder="Libelle.."> <br>
        <div class="custom-file">
           <input name="image" type="file" class="custom-file-input" id="customFile">
           <label class="custom-file-label" for="customFile">Choisir une image..</label>
        </div> <br><br>
        <input name="pays" class="form-control" placeholder="Pays.." type="text"><br>
        <input name="description" class="form-control" placeholder="Description.." type="text"><br>
        <button class="btn btn-success" type = "submit"> GO </button><p></p><br>
    </form>
    <br><br>
    <br> <!-- 2eme formulaire : suppression d'un parc -->
    <u><h1>Supprimer un parc</h1></u><br><br>
    <form name="suppParc" method="post" action="traitSuppParc.php">
    <select name="listeParc" class="custom-select">
              <option selected>Choisir un parc</option>
              <?php 
              include "inc/connectBdd.php";
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
            </select><br><br>
    <button type="submit" class="btn btn-danger">Supprimer</button>
</form><br><br>
    </div>
</div>
</div>
</section>
<?php
 include 'footer.html';
 ?>



