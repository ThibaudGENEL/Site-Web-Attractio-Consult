<?php
include 'entete.php';
?>
<section>
<?php
include 'aside.php';
?>
<div class="col-sm-8">
    <form name="Connexion" method="post" action="traitConnexion.php">
    <div class="form-group">
        <label for="EmailDemo">Votre Email:</label>
        <input type="email" name="email" class="form-control" id="EmailDemo" aria-describedby="emailHelp" placeholder="Entrer email">
        <small id="emailHelp" class="form-text text-muted">Veuillez entrer votre email</small>
    </div>
    <div class="form-group">
        <label for="passDemo">Votre mot de passe:</label>
        <input type="password" name="mdp" class="form-control" id="passDemo" aria-describedby="passHelp" placeholder="Entrer mot de passe">
        <small id="passHelp" class="form-text text-muted">Veuillez entrer le mot de passe associé</small>
    </div>
    <button type="submit" class="btn btn-success">Se connecter</button>
    </form>
</div>
</section>
<?php include 'footer.html';?>
</body>