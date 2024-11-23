<div class="container p-3 my-3 bg-dark text-white" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-3">
    <form name="Connexion" method="post" action="traitAvis.php">
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
    <label>Votre note :</label>
    <select name="listeNote" id="select-note">
	<option value="0">0</option>
	<option value="1">1</option>
	<option value="2">2</option>
    <option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
    </select><br>
    <div class="form-group">
        <label for="passDemo">Rediger votre avis :</label>
        <input type="text" name="avis" class="form-control" id="passDemo" aria-describedby="passHelp" placeholder="votre avis">
        <small id="passHelp" class="form-text text-muted"></small>
    </div>
    <button type="submit" class="btn btn-success">Valider</button>
    </form>
</div>